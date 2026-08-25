@php
    $type = request('type') === 'householder' ? 'householder' : 'homeowner';
    $isHomeowner = $type === 'homeowner';
@endphp
<x-cms-layout title="Home Insurance Page"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Home Insurance' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('house-update')" files>
        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$home->sec1_caption" />
                <x-cms.editor name="body" label="Body" :value="$home->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $isHomeowner ? 'Homeowners' : 'Householders' }}</h2>
            <x-cms.tabs param="type" :tabs="['homeowner' => 'Homeowners', 'householder' => 'Householders']" />
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <x-cms.card title="Card image">
                <x-cms.file-input name="image" label="Card image"
                                  :current="$isHomeowner ? $home->homeowner_ins_image : $home->householder_ins_image" />
            </x-cms.card>
            <x-cms.card title="Feature image">
                <x-cms.file-input name="feature_image" label="Feature image"
                                  :current="$isHomeowner ? $home->homeowner_feature_image : $home->householder_feature_image" />
            </x-cms.card>
        </div>

        <x-cms.card title="{{ $isHomeowner ? 'Homeowners' : 'Householders' }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="body1" label="Body" :value="$isHomeowner ? $home->homeowner_ins_body : $home->householder_ins_body" />
                <x-cms.editor name="features" label="Features" :value="$isHomeowner ? $home->homeowner_ins_features : $home->householder_ins_features" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$type" />
    </x-cms.form>
</x-cms-layout>
