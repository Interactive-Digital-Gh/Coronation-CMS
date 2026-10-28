<?php

use App\Models\AboutUs;
use App\Models\Homepage;
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

test('homepage section 2 saves its caption and body', function () {
    seedContentRow('homepage');

    $this->actingAs(User::factory()->create())
        ->post(route('home-sec2-update'), ['caption' => '<p>Insights</p>', 'body' => '<p>Latest news</p>'])
        ->assertSessionHasNoErrors();

    $home = Homepage::find(1);
    expect([$home->insight_caption, $home->insight_body])->toBe(['<p>Insights</p>', '<p>Latest news</p>']);
});
