<?php

use App\Models\Insight;
use App\Models\User;
use Illuminate\Http\UploadedFile;

// addBlog moves uploads into public/, so remove whatever the test created.
afterEach(function () {
    Insight::all()->each(function (Insight $blog) {
        foreach ([$blog->main_image, $blog->pdf_file] as $path) {
            if ($path && is_file(public_path($path))) {
                unlink(public_path($path));
            }
        }
    });
});

function newBlogPayload(array $overrides = []): array
{
    return array_merge([
        'main_image' => UploadedFile::fake()->image('cover.jpg'),
        'pdf_file' => UploadedFile::fake()->create('article.pdf', 10, 'application/pdf'),
        'caption' => '<p>Caption</p>',
        'excerpt' => '<p>A short summary for the blog card.</p>',
        'body' => '<p>Body</p>',
        'new_category' => 'Insurance',
    ], $overrides);
}

test('a new blog saves its excerpt and serves it from the public API', function () {
    $this->actingAs(User::factory()->create())
        ->post(route('submit-blog'), newBlogPayload())
        ->assertRedirect(route('blogs-all'));

    $blog = Insight::sole();
    expect($blog->excerpt)->toBe('<p>A short summary for the blog card.</p>');

    $blog->forceFill(['publish' => true, 'publish_date' => now()])->save();

    $this->getJson('/api/published-blogs/cards')
        ->assertOk()
        ->assertJsonPath('0.excerpt', '<p>A short summary for the blog card.</p>');
});

test('a new blog requires an excerpt, as editing does', function () {
    $this->actingAs(User::factory()->create())
        ->post(route('submit-blog'), newBlogPayload(['excerpt' => '']))
        ->assertSessionHasErrors('excerpt');

    expect(Insight::count())->toBe(0);
});
