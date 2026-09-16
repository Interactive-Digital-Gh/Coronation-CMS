<?php

use App\Http\Controllers\Controller;
use App\Models\BOD;
use App\Models\User;

/** Invoke the protected Controller::cleanRichText() via a throwaway subclass. */
function clean(?string $html): ?string
{
    return (new class extends Controller
    {
        public function run(?string $html): ?string
        {
            return $this->cleanRichText($html);
        }
    })->run($html);
}

test('cleanRichText strips Word paste bloat but keeps text and structure', function () {
    $word = <<<'HTML'
    <style><!-- p.MsoNormal {mso-style-parent:""; font-family:"Lato";} --></style>
    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings/></xml><![endif]-->
    <p class="MsoNormal" style="margin:0; mso-fareast-font-family:Calibri;"
       lang="EN-US">Mr. Olamide Olajolo is a seasoned professional.<o:p></o:p></p>
    HTML;

    $out = clean($word);

    expect($out)
        ->toContain('Mr. Olamide Olajolo is a seasoned professional.')
        ->toContain('<p>')
        ->not->toContain('<style')
        ->not->toContain('Mso')
        ->not->toContain('mso-')
        ->not->toContain('class=')
        ->not->toContain('style=')
        ->not->toContain('<o:p')
        ->not->toContain('[if');
});

test('cleanRichText leaves plain text and null untouched', function () {
    expect(clean('Just a short bio.'))->toBe('Just a short bio.');
    expect(clean(null))->toBeNull();
    expect(clean(''))->toBe('');
});

test('a board member bio far longer than the old 255-char column saves without error', function () {
    // Reproduces the production 500 (SQLSTATE[22001] on a VARCHAR(255) body).
    // NOTE: SQLite does not enforce string length, so this guards the request
    // flow and the sanitizing; the column-width fix itself is verified against
    // MySQL (SHOW COLUMNS FROM bod -> text).
    $bod = BOD::create([
        'image' => 'images/uploads/about-us/seed.jpg',
        'name' => 'Board Member',
        'title' => 'Director',
        'body' => 'Old short bio.',
    ]);

    $longWordBody = '<p class="MsoNormal" style="mso-fareast:Calibri;">'
        .str_repeat('An experienced director with a long and detailed biography. ', 40)
        .'<o:p></o:p></p>';

    $response = $this->actingAs(User::factory()->create())
        ->post(route('about-sec5-update', ['id' => $bod->id]), [
            'name' => 'Board Member',
            'title' => 'Director',
            'body' => $longWordBody,
        ]);

    $response->assertRedirect(route('about-sec5'));
    $response->assertSessionHasNoErrors();

    $saved = $bod->fresh()->body;
    expect(strlen($saved))->toBeGreaterThan(255);
    expect($saved)
        ->toContain('An experienced director')
        ->not->toContain('class=')
        ->not->toContain('<o:p');
});
