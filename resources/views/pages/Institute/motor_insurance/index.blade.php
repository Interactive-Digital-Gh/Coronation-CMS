@php
    $type = in_array(request('type'), ['tpft', 'tpo']) ? request('type') : 'comp';
    $types = ['comp' => 'Comprehensive', 'tpft' => 'Third party fire and theft', 'tpo' => 'Third party only'];
    $prefix = ['comp' => 'comprehensive_ins', 'tpft' => 'tp_fire_theft', 'tpo' => 'tp_only'][$type];
    $image1 = $motor->{$prefix.'_image'};
    $body1 = $motor->{$prefix.'_body'};
    $features = $motor->{$prefix.'_features'};
@endphp
<x-cms-layout title="Institute Motor Insurance Page"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Motor Insurance' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-motor-section1-update')" files>
        <x-cms.card title="Background image">
            <x-cms.file-input name="image" label="Section 1 image" :current="$motor->sec1_image" />
        </x-cms.card>

        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$motor->sec1_caption" />
                <x-cms.editor name="body" label="Body" :value="$motor->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $types[$type] }}</h2>
            <x-cms.tabs param="type" :tabs="$types" />
        </div>

        <x-cms.card title="Feature image">
            <x-cms.file-input name="background_image" label="Feature image" :current="$image1" />
        </x-cms.card>

        <x-cms.card title="{{ $types[$type] }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="body1" label="Body" :value="$body1" />
                <x-cms.editor name="features" label="Features" :value="$features" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$type" />
    </x-cms.form>
</x-cms-layout>
