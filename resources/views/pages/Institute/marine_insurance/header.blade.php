<x-cms-layout title="Institute Marine Insurance Header"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Marine Insurance Header' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-marine-header-update')" files>
        <x-cms.card title="Header image">
            <x-cms.file-input name="image" label="Header image" :current="$marine->header_image" />
        </x-cms.card>

        <x-cms.card title="Header text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$marine->header_caption" />
                <x-cms.editor name="body" label="Body" :value="$marine->header_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
