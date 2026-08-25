@php
    $type = request('type') === 'hull' ? 'hull' : 'cargo';
    $types = ['cargo' => 'Marine cargo', 'hull' => 'Marine hull'];
    $image = $marine->{'marine_'.$type.'_features_image'};
    $body1 = $marine->{'marine_'.$type.'_body'};
    $features = $marine->{'marine_'.$type.'_features'};
@endphp
<x-cms-layout title="Institute Marine Insurance Page"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Marine Insurance' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-marine-update')" files>
        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$marine->sec1_caption" />
                <x-cms.editor name="body" label="Body" :value="$marine->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $types[$type] }}</h2>
            <x-cms.tabs param="type" :tabs="$types" />
        </div>

        <x-cms.card title="Feature image">
            <x-cms.file-input name="image" label="Feature image" :current="$image" />
        </x-cms.card>

        <x-cms.card title="{{ $types[$type] }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="insurance_body" label="Body" :value="$body1" />
                <x-cms.editor name="features" label="Features" :value="$features" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$type" />
    </x-cms.form>
</x-cms-layout>
