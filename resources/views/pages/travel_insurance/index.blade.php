@php
    $type = request('type') === 'individual' ? 'individual' : 'student';
    $isStudent = $type === 'student';
@endphp
<x-cms-layout title="Travel Insurance Page"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Travel Insurance' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('travel-update')" files>
        <x-cms.card title="Section 1 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$travel->sec1_caption" />
                <x-cms.editor name="body" label="Body" :value="$travel->sec1_body" />
            </div>
        </x-cms.card>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <h2 class="text-lg font-semibold text-gray-900">{{ $isStudent ? 'Students' : 'Individuals' }}</h2>
            <x-cms.tabs param="type" :tabs="['student' => 'Students', 'individual' => 'Individuals']" />
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <x-cms.card title="Card image">
                <x-cms.file-input name="image" label="Card image"
                                  :current="$isStudent ? $travel->student_ins_image : $travel->individual_ins_image" />
            </x-cms.card>
            <x-cms.card title="Feature image">
                <x-cms.file-input name="feature_image" label="Feature image"
                                  :current="$isStudent ? $travel->student_feature_image : $travel->individual_feature_image" />
            </x-cms.card>
        </div>

        <x-cms.card title="{{ $isStudent ? 'Students' : 'Individuals' }} text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="body1" label="Body" :value="$isStudent ? $travel->student_insurance_body : $travel->individual_insurance_body" />
                <x-cms.editor name="features" label="Features" :value="$isStudent ? $travel->student_insurance_features : $travel->individual_insurance_features" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$type" />
    </x-cms.form>
</x-cms-layout>
