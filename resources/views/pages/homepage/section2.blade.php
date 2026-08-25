<x-cms-layout title="Homepage Section 2"
              :breadcrumbs="['Individual' => null, 'Homepage' => route('home-header'), 'Section 2' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('home-sec2-update')">
        <x-cms.card title="Section 2 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$home->insight_caption" />
                <x-cms.editor name="body" label="Body" :value="$home->insight_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
