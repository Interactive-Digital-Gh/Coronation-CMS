@php
    $card = in_array(request('card'), ['travel', 'house']) ? request('card') : 'motor';
    $cardLabels = ['motor' => 'Motor Insurance', 'travel' => 'Travel Insurance', 'house' => 'House Insurance'];
    $cardImage = match ($card) {
        'travel' => $pns->travel_image,
        'house' => $pns->house_image,
        default => $pns->motor_image,
    };
    $cardCaption = match ($card) {
        'travel' => $pns->travel_caption,
        'house' => $pns->house_caption,
        default => $pns->motor_caption,
    };
    $cardBody = match ($card) {
        'travel' => $pns->travel_body,
        'house' => $pns->house_body,
        default => $pns->motor_body,
    };
@endphp
<x-cms-layout title="Products & Solutions Section 1"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Section 1' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('pns-section1-update')" files>
        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption1" label="Caption" :value="$pns->sec1_caption" />
                <x-cms.editor name="body1" label="Body" :value="$pns->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $cardLabels[$card] }}</h2>
            <x-cms.tabs param="card" :tabs="$cardLabels" />
        </div>

        <x-cms.card title="Card image">
            <x-cms.file-input name="image" label="Card image" :current="$cardImage" />
        </x-cms.card>

        <x-cms.card title="{{ $cardLabels[$card] }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$cardCaption" />
                <x-cms.editor name="body" label="Body" :value="$cardBody" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$card" />
    </x-cms.form>
</x-cms-layout>
