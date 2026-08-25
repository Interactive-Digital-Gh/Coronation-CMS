<x-cms-layout title="Careers Section 2"
              :breadcrumbs="['Individual' => null, 'Careers' => route('careers-header'), 'Section 2' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('careers-section2-update')" files>
        <x-cms.card title="Section image">
            <x-cms.file-input name="image" label="Section image" :current="$career->sec2_image" />
        </x-cms.card>

        <x-cms.card title="Section text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$career->sec2_caption" />
                <x-cms.editor name="body" label="Body" :value="$career->sec2_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
