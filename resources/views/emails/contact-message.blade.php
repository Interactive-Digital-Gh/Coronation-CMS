<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New contact message</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #141415; line-height: 1.5;">
    <h2 style="margin-bottom: 4px;">New contact message</h2>
    <p style="margin-top: 0; color: #56575d;">Submitted from the Coronation Insurance Ghana website contact form.</p>

    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr><td style="font-weight: bold;">Name</td><td>{{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</td></tr>
        <tr><td style="font-weight: bold;">Email</td><td><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></td></tr>
        <tr><td style="font-weight: bold;">Phone</td><td>{{ $contactMessage->phone_number }}</td></tr>
        @if ($contactMessage->request_related)
        <tr><td style="font-weight: bold;">Request</td><td>{{ $contactMessage->request_related }}</td></tr>
        @endif
        @if ($contactMessage->enquiry_related)
        <tr><td style="font-weight: bold;">Enquiry</td><td>{{ $contactMessage->enquiry_related }}</td></tr>
        @endif
        @if ($contactMessage->company_related)
        <tr><td style="font-weight: bold;">Company</td><td>{{ $contactMessage->company_related }}</td></tr>
        @endif
        <tr><td style="font-weight: bold; vertical-align: top;">Message</td><td>{!! nl2br(e($contactMessage->message)) !!}</td></tr>
        @if ($contactMessage->preferred_date_time)
        <tr><td style="font-weight: bold;">Preferred date/time</td><td>{{ $contactMessage->preferred_date_time }}</td></tr>
        @endif
        <tr><td style="font-weight: bold;">Received</td><td>{{ $contactMessage->created_at?->format('d M Y, H:i') }}</td></tr>
    </table>

    <p style="color: #56575d; font-size: 12px;">Reply to this email to respond to the sender directly. All messages are also listed under Contact Messages in the CMS.</p>
</body>
</html>
