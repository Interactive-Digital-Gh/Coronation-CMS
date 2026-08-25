<x-cms-layout title="About Page Section 4"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Section 4' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('about-sec4-update')" files>
        <x-cms.card title="Section 4 image">
            <x-cms.file-input name="image" label="Section 4 image" :current="$about->sec4_image" />
        </x-cms.card>

        <x-cms.card title="Section 4 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$about->sec4_caption" />
                <x-cms.editor name="body" label="Body" :value="$about->sec4_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
