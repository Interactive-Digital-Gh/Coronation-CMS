<x-cms-layout title="Institute Engineering Insurance Header"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Engineering Insurance Header' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-eng-header-update')" files>
        <x-cms.card title="Header image">
            <x-cms.file-input name="image" label="Header image" :current="$eng->header_image" />
        </x-cms.card>

        <x-cms.card title="Header text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$eng->header_caption" />
                <x-cms.editor name="body" label="Body" :value="$eng->header_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
