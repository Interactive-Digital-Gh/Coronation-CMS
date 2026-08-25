@php
    $card = in_array(request('card'), ['eng', 'marine']) ? request('card') : 'motor';
    $cards = ['motor' => 'Motor insurance', 'eng' => 'Engineering insurance', 'marine' => 'Marine insurance'];
    $cardImage = $pns->{$card.'_image'};
    $cardCaption = $pns->{$card.'_caption'};
    $cardBody = $pns->{$card.'_body'};
@endphp
<x-cms-layout title="Institute Products & Solutions Section 1"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Section 1' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-pns-section1-update')" files>
        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption1" label="Caption" :value="$pns->sec1_caption" />
                <x-cms.editor name="body1" label="Body" :value="$pns->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $cards[$card] }}</h2>
            <x-cms.tabs param="card" :tabs="$cards" />
        </div>

        <x-cms.card title="Card image">
            <x-cms.file-input name="image" label="Card image" :current="$cardImage" />
        </x-cms.card>

        <x-cms.card title="{{ $cards[$card] }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$cardCaption" />
                <x-cms.editor name="body" label="Body" :value="$cardBody" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$card" />
    </x-cms.form>
</x-cms-layout>
