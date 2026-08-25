<?php

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;

beforeEach(function () {
    config(['uploads.max_image_kb' => 1024]);
});

test('an image larger than the configured cap is rejected', function () {
    $response = $this->actingAs(User::factory()->create())
        ->post(route('home-header-update'), [
            'image' => UploadedFile::fake()->image('big.jpg')->size(1025),
            'caption' => 'Caption',
            'body' => 'Body',
        ]);

    $response->assertSessionHasErrors('image');
});

test('the shared image rules accept an image within the cap', function () {
    $rules = (new class extends Controller
    {
        public function rules(): string
        {
            return $this->imageRules();
        }
    })->rules();

    $validator = Validator::make(
        ['image' => UploadedFile::fake()->image('ok.jpg')->size(1024)],
        ['image' => $rules],
    );

    expect($validator->passes())->toBeTrue();
});

test('a post larger than php post_max_size becomes a form error instead of a 413', function () {
    $response = $this->actingAs(User::factory()->create())
        ->call('POST', route('home-header-update'), [], [], [], ['CONTENT_LENGTH' => PHP_INT_MAX]);

    $response->assertRedirect();
    $response->assertSessionHasErrors('upload');
});
