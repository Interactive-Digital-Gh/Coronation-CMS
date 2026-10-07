<?php

use App\Mail\QuoteRequestReceived;
use App\Models\QuoteRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

function validQuotePayload(array $overrides = []): array
{
    return array_merge([
        'product' => 'Motor Insurance',
        'first_name' => 'Ama',
        'last_name' => 'Mensah',
        'email' => 'ama@example.com',
        'phone' => '+233201234567',
        'message' => 'I need cover for a 2020 Toyota Corolla.',
        'page_url' => 'https://coronation.com.gh/individual/products/motor',
    ], $overrides);
}

test('a valid quote request is saved and acknowledged', function () {
    Mail::fake();
    config(['quotes.notify_to' => ['sales@example.com']]);

    $response = $this->postJson('/api/quote/request', validQuotePayload());

    $response->assertOk()->assertJson(['status' => 'Success']);

    $this->assertDatabaseHas('quote_requests', [
        'product' => 'Motor Insurance',
        'email' => 'ama@example.com',
        'phone' => '+233201234567',
    ]);

    Mail::assertSent(QuoteRequestReceived::class, function (QuoteRequestReceived $mail) {
        return $mail->hasTo('sales@example.com')
            && $mail->hasReplyTo('ama@example.com')
            && $mail->quoteRequest->first_name === 'Ama';
    });
});

test('no email is sent when no notification address is configured', function () {
    Mail::fake();
    config(['quotes.notify_to' => []]);

    $this->postJson('/api/quote/request', validQuotePayload())
        ->assertOk()
        ->assertJson(['status' => 'Success']);

    expect(QuoteRequest::count())->toBe(1);
    Mail::assertNothingSent();
});

test('a missing email is rejected with a validation error', function () {
    $response = $this->postJson('/api/quote/request', validQuotePayload(['email' => '']));

    $response->assertStatus(422)->assertJsonValidationErrors(['email']);

    expect(QuoteRequest::count())->toBe(0);
});

test('a filled honeypot field is silently dropped', function () {
    Mail::fake();
    config(['quotes.notify_to' => ['sales@example.com']]);

    $this->postJson('/api/quote/request', validQuotePayload(['website' => 'http://spam.example']))
        ->assertOk()
        ->assertJson(['status' => 'Success']);

    expect(QuoteRequest::count())->toBe(0);
    Mail::assertNothingSent();
});

test('the quote requests page lists saved requests to a signed-in user', function () {
    QuoteRequest::create(validQuotePayload());

    $this->actingAs(User::factory()->create())
        ->get(route('quote-requests'))
        ->assertOk()
        ->assertSee('Motor Insurance')
        ->assertSee('Ama Mensah')
        ->assertSee('ama@example.com');
});

test('the quote requests page requires login', function () {
    $this->get(route('quote-requests'))->assertRedirect(route('login'));
});
