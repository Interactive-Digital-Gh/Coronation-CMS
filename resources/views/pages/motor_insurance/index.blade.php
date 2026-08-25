@php
    $type = in_array(request('type'), ['tpft', 'tpo']) ? request('type') : 'comp';
    $typeLabels = ['comp' => 'Comprehensive Insurance', 'tpft' => 'Third Party Fire and Theft', 'tpo' => 'Third Party Only'];
    $featureImage = match ($type) {
        'tpft' => $motor->tp_fire_theft_features_image,
        'tpo' => $motor->tp_only_features_image,
        default => $motor->compliance_ins_feature_image,
    };
    $body1 = match ($type) {
        'tpft' => $motor->tp_fire_theft_body,
        'tpo' => $motor->tp_only_body,
        default => $motor->compliance_ins_body,
    };
    $features = match ($type) {
        'tpft' => $motor->tp_fire_theft_features,
        'tpo' => $motor->tp_only_features,
        default => $motor->compliance_ins_features,
    };
@endphp
<x-cms-layout title="Motor Insurance Page"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Motor Insurance' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('motor-update')" files>
        <x-cms.card title="Section 1 image">
            <x-cms.file-input name="image" label="Section 1 image" :current="$motor->sec1_image" />
        </x-cms.card>

        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$motor->sec1_caption" />
                <x-cms.editor name="body" label="Body" :value="$motor->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $typeLabels[$type] }}</h2>
            <x-cms.tabs param="type" :tabs="$typeLabels" />
        </div>

        <x-cms.card title="Features image">
            <x-cms.file-input name="feature_image" label="Features image" :current="$featureImage" />
        </x-cms.card>

        <x-cms.card title="{{ $typeLabels[$type] }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="body1" label="Body" :value="$body1" />
                <x-cms.editor name="features" label="Features" :value="$features" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$type" />
    </x-cms.form>
</x-cms-layout>
