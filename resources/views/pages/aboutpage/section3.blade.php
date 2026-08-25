<x-cms-layout title="About Page Section 3"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Section 3' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('about-sec3-update')" files>
        <x-cms.card title="Section 3 image">
            <x-cms.file-input name="image" label="Section 3 image" :current="$about->sec3_image" />
        </x-cms.card>

        <x-cms.card title="Section 3 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$about->sec3_caption" />
                <x-cms.editor name="body" label="Body" :value="$about->sec3_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
