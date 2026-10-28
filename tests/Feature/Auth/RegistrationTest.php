<?php

use App\Models\User;

test('guests cannot open or submit the registration form', function () {
    $this->get('/register')->assertRedirect(route('login'));

    $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertRedirect(route('login'));

    $this->assertGuest();
    expect(User::where('email', 'test@example.com')->exists())->toBeFalse();
});

test('a signed-in admin can add another admin and stays signed in', function () {
    $admin = User::factory()->create();

    $this->actingAs($admin)->get('/register')->assertOk();

    $this->actingAs($admin)->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertRedirect(route('register'));

    $this->assertAuthenticatedAs($admin);
    expect(User::where('email', 'test@example.com')->exists())->toBeTrue();
});
