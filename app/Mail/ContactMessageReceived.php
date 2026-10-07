<?php

namespace App\Mail;

use App\Models\ContactFormMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactFormMessage $contactMessage)
    {
    }

    public function envelope(): Envelope
    {
        $name = trim($this->contactMessage->first_name.' '.$this->contactMessage->last_name);

        return new Envelope(
            subject: 'New contact message from '.$name,
            replyTo: [new Address($this->contactMessage->email, $name)],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-message',
        );
    }
}
