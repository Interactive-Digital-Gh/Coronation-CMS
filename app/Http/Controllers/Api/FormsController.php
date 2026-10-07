<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReceived;
use App\Mail\QuoteRequestReceived;
use App\Models\ContactFormMessage;
use App\Models\FeedbackMessage;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FormsController extends Controller
{
    // Contact form on the website contact pages. Saved first, then emailed to
    // config('quotes.notify_to') when that list is set.
    public function saveContactFormMessage(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return ['status' => 'Success'];
        }

        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:190',
            // Sent as typed on the website, e.g. "+233 24 123 4567"
            'phone_number' => 'required|string|max:30',
            'request_related' => 'nullable|string|max:190',
            'enquiry_related' => 'nullable|string|max:190',
            'company_related' => 'nullable|string|max:190',
            'message' => 'required|string|max:5000',
            'preferred_date_time' => 'nullable|string|max:190',
        ]);

        $message = ContactFormMessage::create($data);

        if (! $message) {
            return [
                'status' => 'Failed',
                'message' => 'Error while saving data',
            ];
        }

        $this->notify(new ContactMessageReceived($message), 'Contact message email failed', [
            'contact_form_message_id' => $message->id,
        ]);

        return ['status' => 'Success'];
    }

    public function saveFeedbackMessage(Request $request)
    {
        $data = $request->validate([
            'rating' => 'required|numeric',
            'likely_to_recommend' => 'required|numeric',
            'feedback' => 'nullable',
        ]);

        $feedback = FeedbackMessage::create($data);

        if ($feedback) {
            return [
                'status' => 'Success',
            ];
        }

        return [
            'status' => 'Failed',
            'message' => 'Error while saving data',
        ];
    }

    // Quote request from the website product pages. Saved first, then emailed to
    // config('quotes.notify_to') when that list is set; a mail failure is logged
    // and never loses the saved request or fails the response.
    public function saveQuoteRequest(Request $request)
    {
        if ($this->isHoneypotFilled($request)) {
            return ['status' => 'Success'];
        }

        $data = $request->validate([
            'product' => 'required|string|max:120',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:190',
            'phone' => 'required|string|max:30',
            'message' => 'nullable|string|max:2000',
            'page_url' => 'nullable|string|max:500',
        ]);

        $quote = QuoteRequest::create($data);

        if (! $quote) {
            return [
                'status' => 'Failed',
                'message' => 'Error while saving data',
            ];
        }

        $this->notify(new QuoteRequestReceived($quote), 'Quote request email failed', [
            'quote_request_id' => $quote->id,
        ]);

        return ['status' => 'Success'];
    }

    // Honeypot: real visitors never see the "website" field, so a value means a
    // bot. Callers pretend it worked so the bot moves on.
    private function isHoneypotFilled(Request $request): bool
    {
        return filled($request->input('website'));
    }

    // Sends synchronously (there is no queue worker) to the configured
    // recipients. A mail failure is logged and must never fail the response,
    // because the submission is already saved.
    private function notify(Mailable $mail, string $failureMessage, array $context = []): void
    {
        $recipients = config('quotes.notify_to', []);

        if (empty($recipients)) {
            return;
        }

        try {
            Mail::to($recipients)->send($mail);
        } catch (\Throwable $e) {
            Log::error($failureMessage, $context + ['error' => $e->getMessage()]);
        }
    }
}
