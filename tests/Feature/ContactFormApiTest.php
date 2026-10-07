<?php

use App\Mail\ContactMessageReceived;
use App\Models\ContactFormMessage;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

function validContactPayload(array $overrides = []): array
{
    return array_merge([
        'first_name' => 'Kofi',
        'last_name' => 'Boateng',
        'email' => 'kofi@example.com',
        'phone_number' => '+233 24 123 4567',
        'request_related' => 'Quote',
        'enquiry_related' => 'Motor Insurance',
        'company_related' => 'Acme Ltd',
        'message' => 'Please call me about fleet cover.',
        'preferred_date_time' => '2026-10-10 10:00',
    ], $overrides);
}

test('a valid contact message is saved and emailed with reply-to the sender', function () {
    Mail::fake();
    config(['quotes.notify_to' => ['sales@example.com']]);

    $this->postJson('/api/contact/form', validContactPayload())
        ->assertOk()
        ->assertJson(['status' => 'Success']);

    $this->assertDatabaseHas('contact_form_messages', [
        'first_name' => 'Kofi',
        'email' => 'kofi@example.com',
        'phone_number' => '+233 24 123 4567',
        'company_related' => 'Acme Ltd',
    ]);

    Mail::assertSent(ContactMessageReceived::class, function (ContactMessageReceived $mail) {
        return $mail->hasTo('sales@example.com')
            && $mail->hasReplyTo('kofi@example.com')
            && $mail->hasSubject('New contact message from Kofi Boateng');
    });
});

test('a phone number with plus sign and spaces is accepted', function () {
    $this->postJson('/api/contact/form', validContactPayload(['phone_number' => '+233 (0) 20 987 6543']))
        ->assertOk()
        ->assertJson(['status' => 'Success']);

    expect(ContactFormMessage::count())->toBe(1);
});

test('a contact message without a message body is rejected', function () {
    $this->postJson('/api/contact/form', validContactPayload(['message' => '']))
        ->assertStatus(422)
        ->assertJsonValidationErrors(['message']);

    expect(ContactFormMessage::count())->toBe(0);
});

test('a filled honeypot on the contact form is silently dropped', function () {
    Mail::fake();
    config(['quotes.notify_to' => ['sales@example.com']]);

    $this->postJson('/api/contact/form', validContactPayload(['website' => 'http://spam.example']))
        ->assertOk()
        ->assertJson(['status' => 'Success']);

    expect(ContactFormMessage::count())->toBe(0);
    Mail::assertNothingSent();
});

test('the contact messages page lists saved messages to a signed-in user', function () {
    ContactFormMessage::create(validContactPayload());

    $this->actingAs(User::factory()->create())
        ->get(route('contact-messages'))
        ->assertOk()
        ->assertSee('Kofi Boateng')
        ->assertSee('kofi@example.com')
        ->assertSee('Acme Ltd')
        ->assertSee('Please call me about fleet cover.');
});

test('the contact messages page requires login', function () {
    $this->get(route('contact-messages'))->assertRedirect(route('login'));
});
