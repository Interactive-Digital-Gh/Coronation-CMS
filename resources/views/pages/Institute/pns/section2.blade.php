<x-cms-layout title="Institute Products & Solutions Section 2"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Section 2' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-pns-section2-update')" files>
        <x-cms.card title="Section 2 image">
            <x-cms.file-input name="image" label="Section 2 image" :current="$pns->sec2_image" />
        </x-cms.card>

        <x-cms.card title="Section 2 text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$pns->sec2_caption" />
                <x-cms.editor name="body" label="Body" :value="$pns->sec2_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
