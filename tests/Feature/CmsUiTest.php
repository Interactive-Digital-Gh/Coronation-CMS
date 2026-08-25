<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

test('destructive blog actions are not reachable via GET', function () {
    $this->get('/insights/blog/1')->assertStatus(405);
    $this->get('/insights/blog/1/publish')->assertStatus(405);
    $this->get('/about/section5/1')->assertStatus(405);
    $this->get('/about/executive-members/1')->assertStatus(405);
});

test('a successful update flashes a success message', function () {
    $columns = array_diff(Schema::getColumnListing('homepage'), ['id', 'created_at', 'updated_at']);
    \App\Models\Homepage::forceCreate(['id' => 1] + array_fill_keys($columns, 'x'));

    $this->post(route('home-header-update'), ['caption' => 'Hello', 'body' => 'World'])
        ->assertRedirect()
        ->assertSessionHasNoErrors()
        ->assertSessionHas("success");
});

test('cms pages render with the new layout', function () {
    $this->get(route('blogs-all'))
        ->assertOk()
        ->assertSee('Coronation CMS')
        ->assertSee('No blogs yet')
        ->assertDontSee('bootstrap');
});
