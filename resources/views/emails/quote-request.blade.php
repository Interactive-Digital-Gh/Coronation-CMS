<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New quote request</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #141415; line-height: 1.5;">
    <h2 style="margin-bottom: 4px;">New quote request</h2>
    <p style="margin-top: 0; color: #56575d;">Submitted from the Coronation Insurance Ghana website.</p>

    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr><td style="font-weight: bold;">Product</td><td>{{ $quoteRequest->product }}</td></tr>
        <tr><td style="font-weight: bold;">Name</td><td>{{ $quoteRequest->full_name }}</td></tr>
        <tr><td style="font-weight: bold;">Email</td><td><a href="mailto:{{ $quoteRequest->email }}">{{ $quoteRequest->email }}</a></td></tr>
        <tr><td style="font-weight: bold;">Phone</td><td>{{ $quoteRequest->phone }}</td></tr>
        @if ($quoteRequest->message)
        <tr><td style="font-weight: bold; vertical-align: top;">Message</td><td>{!! nl2br(e($quoteRequest->message)) !!}</td></tr>
        @endif
        @if ($quoteRequest->page_url)
        <tr><td style="font-weight: bold;">Page</td><td>{{ $quoteRequest->page_url }}</td></tr>
        @endif
        <tr><td style="font-weight: bold;">Received</td><td>{{ $quoteRequest->created_at?->format('d M Y, H:i') }}</td></tr>
    </table>

    <p style="color: #56575d; font-size: 12px;">Reply to this email to respond to the requester directly. All requests are also listed under Quote Requests in the CMS.</p>
</body>
</html>
