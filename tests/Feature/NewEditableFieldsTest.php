<?php

use App\Models\AboutUs;
use App\Models\Homepage;
use App\Models\Insight;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/** Insert row 1 into a content table, filling every required column with placeholder text. */
function seedContentRow(string $table): void
{
    $row = ['id' => 1];

    foreach (Schema::getColumns($table) as $column) {
        if (! $column['nullable'] && $column['default'] === null && ! $column['auto_increment']) {
            $row[$column['name']] = 'lorem';
        }
    }

    DB::table($table)->insert($row);
}

function blog(): Insight
{
    return Insight::forceCreate([
        'main_image' => 'images/uploads/blog.jpg',
        'pdf_file' => 'pdf/blog.pdf',
        'caption' => '<p>Blog</p>',
        'excerpt' => '<p>Excerpt</p>',
        'body' => '<p>Body</p>',
        'category' => 'insurance',
    ]);
}

test('the board of directors caption and body can be edited and reach the API', function () {
    seedContentRow('about_us');

    $longBody = '<p class="MsoNormal">'.str_repeat('Our board brings decades of experience. ', 20).'</p>';

    $this->actingAs(User::factory()->create())
        ->post(route('about-bod-text-update'), ['caption' => 'Board of Directors', 'body' => $longBody])
        ->assertSessionHasNoErrors();

    $about = AboutUs::find(1);
    expect($about->bod_caption)->toBe('Board of Directors');
    expect($about->bod_body)->toContain('decades of experience')->not->toContain('MsoNormal');
});

test('homepage insight tiles can be set to sorted or hand-picked posts', function () {
    seedContentRow('homepage');
    [$a, $b, $c] = [blog(), blog(), blog()];
    $user = User::factory()->create();

    $this->actingAs($user)->post(route('home-sec2-update'), [
        'caption' => 'Insights',
        'body' => '<p>Latest</p>',
        'insight_arr_type' => 'select',
        'insight_sort' => 'asc',
        'insight_tile1_id' => $c->id,
        'insight_tile2_id' => $a->id,
        'insight_tile3_id' => $b->id,
    ])->assertSessionHasNoErrors();

    $home = Homepage::find(1);
    expect([$home->insight_arr_type, $home->insight_tile1_id, $home->insight_tile2_id, $home->insight_tile3_id])
        ->toEqual(['select', (string) $c->id, (string) $a->id, (string) $b->id]);

    // Switching back to sorting keeps the earlier picks.
    $this->actingAs($user)->post(route('home-sec2-update'), [
        'caption' => 'Insights',
        'body' => '<p>Latest</p>',
        'insight_arr_type' => 'sort',
        'insight_sort' => 'desc',
    ])->assertSessionHasNoErrors();

    $home->refresh();
    expect([$home->insight_arr_type, $home->insight_sort, $home->insight_tile1_id])
        ->toEqual(['sort', 'desc', (string) $c->id]);
});

test('picking tiles requires three existing posts', function () {
    seedContentRow('homepage');

    $this->actingAs(User::factory()->create())->post(route('home-sec2-update'), [
        'caption' => 'Insights',
        'body' => '<p>Latest</p>',
        'insight_arr_type' => 'select',
        'insight_sort' => 'asc',
        'insight_tile1_id' => 999,
    ])->assertSessionHasErrors(['insight_tile1_id', 'insight_tile2_id', 'insight_tile3_id']);
});
