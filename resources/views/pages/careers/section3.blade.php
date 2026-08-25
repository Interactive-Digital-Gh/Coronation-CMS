@php
    $card = in_array(request('card'), ['1', '2', '3', '4', '5']) ? request('card') : '1';
    $prefix = 'card'.$card;
@endphp
<x-cms-layout title="Careers Section 3"
              :breadcrumbs="['Individual' => null, 'Careers' => route('careers-header'), 'Section 3' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('careers-section3-update')" files>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-lg font-semibold text-gray-900">Card {{ $card }}</h2>
            <x-cms.tabs param="card" :tabs="['1' => 'Card 1', '2' => 'Card 2', '3' => 'Card 3', '4' => 'Card 4', '5' => 'Card 5']" />
        </div>

        <x-cms.card title="Card image">
            <x-cms.file-input name="image" label="Card image" :current="$career->{$prefix.'_image'}" />
        </x-cms.card>

        <x-cms.card title="Card text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$career->{$prefix.'_caption'}" />
                <x-cms.editor name="body" label="Body" :value="$career->{$prefix.'_body'}" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$prefix" />
    </x-cms.form>
</x-cms-layout>
