<?php

namespace App\Http\Controllers;

use App\Models\ContactFormMessage;
use Inertia\Inertia;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactFormMessage::latest()->paginate(25);

        return Inertia::render('ContactMessages/Index', compact('messages'));
    }
}
