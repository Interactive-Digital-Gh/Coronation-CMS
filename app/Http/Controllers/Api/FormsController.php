<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactFormMessage;
use App\Mail\QuoteRequestReceived;
use App\Models\FeedbackMessage;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FormsController extends Controller
{
    public function saveContactFormMessage(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'request_related' => 'nullable',
            'enquiry_related' => 'nullable',
            'company_related' => 'nullable',
            'message' => 'required',
            'preferred_date_time' => 'nullable'
        ]);

        $data = $request->all();
        $message = ContactFormMessage::create($data);
        if($message){
            return [
                'status' => 'Success'
            ];
        }else{
            return [
                'status' => 'Failed',
                'message' => 'Error while saving data'
            ];
        }


    }




    public function saveFeedbackMessage(Request $request){
        $data = $request->validate([
            'rating' => 'required|numeric',
            'likely_to_recommend' => 'required|numeric',
            'feedback' => 'nullable'
        ]);

        $data = $request->all();
        $feedback = FeedbackMessage::create($data);
        if($feedback){
            return [
                'status' => 'Success'
            ];
        }else{
            return [
                'status' => 'Failed',
                'message' => 'Error while saving data'
            ];
        }


    }

    // Quote request from the website product pages. Saved first, then emailed to
    // config('quotes.notify_to') when that list is set; a mail failure is logged
    // and never loses the saved request or fails the response.
    public function saveQuoteRequest(Request $request)
    {
        // Honeypot: real visitors never see this field, so a value means a bot.
        // Pretend it worked so the bot moves on.
        if (filled($request->input('website'))) {
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

        $recipients = config('quotes.notify_to', []);

        if (! empty($recipients)) {
            try {
                Mail::to($recipients)->send(new QuoteRequestReceived($quote));
            } catch (\Throwable $e) {
                Log::error('Quote request email failed', [
                    'quote_request_id' => $quote->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return ['status' => 'Success'];
    }
}
