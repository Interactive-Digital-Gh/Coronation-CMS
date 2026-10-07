<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $requests = QuoteRequest::latest()->paginate(25);

        return view('pages.quote-requests.index', compact('requests'));
    }
}
