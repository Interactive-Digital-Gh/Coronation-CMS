@php
    $card = request('card') === 'right' ? 'right' : 'left';
    $isLeft = $card === 'left';
@endphp
<x-cms-layout title="Homepage Section 1"
              :breadcrumbs="['Individual' => null, 'Homepage' => route('home-header'), 'Section 1' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('home-sec1-update')" files>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-lg font-semibold text-gray-900">{{ $isLeft ? 'Left card' : 'Right card' }}</h2>
            <x-cms.tabs param="card" :tabs="['left' => 'Left card', 'right' => 'Right card']" />
        </div>

        <x-cms.card title="{{ $isLeft ? 'Left card' : 'Right card' }} image">
            <x-cms.file-input name="image" label="Card image" :current="$isLeft ? $home->tile1_image : $home->tile2_image" />
        </x-cms.card>

        <x-cms.card title="{{ $isLeft ? 'Left card' : 'Right card' }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$isLeft ? $home->tile1_caption : $home->tile2_caption" />
                <x-cms.editor name="body" label="Body" :value="$isLeft ? $home->tile1_text : $home->tile2_text" />
            </div>
        </x-cms.card>

        <x-cms.card title="{{ $isLeft ? 'Left card' : 'Right card' }} button">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.input name="text" label="Button text" :value="$isLeft ? $home->tile1_btn_text : $home->tile2_btn_text" required />
                <x-cms.input name="link" label="Button link" :value="$isLeft ? $home->tile1_btn_link : $home->tile2_btn_link" required />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$card" />
    </x-cms.form>
</x-cms-layout>
