<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Inertia\Inertia;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $requests = QuoteRequest::latest()->paginate(25);

        return Inertia::render('QuoteRequests/Index', compact('requests'));
    }
}
