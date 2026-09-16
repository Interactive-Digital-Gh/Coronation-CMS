<?php

use App\Models\Homepage;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

it('redirects guests from the CMS root to the login page', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('login'));
});

it('serves the CMS landing page to an authenticated user', function () {
    // The landing page renders the single homepage row, whose columns are all
    // NOT NULL; seed one with every column filled so the view can render.
    $columns = array_diff(Schema::getColumnListing((new Homepage)->getTable()), ['id']);
    Homepage::forceCreate(['id' => 1] + array_fill_keys($columns, 'x'));

    $response = $this->actingAs(User::factory()->create())->get('/');

    $response->assertOk();
});
