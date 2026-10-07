<?php

namespace App\Http\Controllers;

use App\Models\ContactFormMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactFormMessage::latest()->paginate(25);

        return view('pages.contact-messages.index', compact('messages'));
    }
}
