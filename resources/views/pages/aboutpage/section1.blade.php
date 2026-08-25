<x-cms-layout title="About Page Section 1"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Section 1' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('about-sec1-update')">
        <x-cms.card title="Section 1 left">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption_right" label="Caption" :value="$about->sec1_caption_left" />
                <x-cms.editor name="body_right" label="Body" :value="$about->sec1_body_left" />
            </div>
        </x-cms.card>

        <x-cms.card title="Section 1 right">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption_left" label="Caption" :value="$about->sec1_caption_right" />
                <x-cms.editor name="body_left" label="Body" :value="$about->sec1_body_right" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
