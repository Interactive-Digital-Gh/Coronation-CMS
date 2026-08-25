@php
    $type = in_array(request('type'), ['contractors', 'machinery', 'erection', 'computer']) ? request('type') : 'plant';
    $types = [
        'plant' => 'Plant all risk',
        'contractors' => 'Contractors all risk',
        'machinery' => 'Machinery breakdown',
        'erection' => 'Erection all risk',
        'computer' => 'Electronic equipment computer all risk',
    ];
    $prefix = [
        'plant' => 'plant_all_risk',
        'contractors' => 'contractors_all_risk',
        'machinery' => 'machinery_breakdown',
        'erection' => 'erection_all',
        'computer' => 'computer_all_risk',
    ][$type];
    $image = $eng->{$prefix.'_image'};
    $body1 = $eng->{$prefix.'_body'};
    $features = $eng->{$prefix.'_features'};
    $featureImage = $eng->{$prefix.'_features_image'};
@endphp
<x-cms-layout title="Institute Engineering Insurance Page"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Engineering Insurance' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-engineering-update')" files>
        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$eng->sec1_caption" />
                <x-cms.editor name="body" label="Body" :value="$eng->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $types[$type] }}</h2>
            <x-cms.tabs param="type" :tabs="$types" />
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <x-cms.card title="Card image">
                <x-cms.file-input name="image" label="Card image" :current="$image" />
            </x-cms.card>
            <x-cms.card title="Feature image">
                <x-cms.file-input name="feature_image" label="Feature image" :current="$featureImage" />
            </x-cms.card>
        </div>

        <x-cms.card title="{{ $types[$type] }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="insurance_body" label="Body" :value="$body1" />
                <x-cms.editor name="features" label="Features" :value="$features" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$type" />
    </x-cms.form>
</x-cms-layout>
