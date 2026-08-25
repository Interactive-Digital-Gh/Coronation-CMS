<x-cms-layout title="Travel Insurance Header"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Travel Insurance Header' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('travel-header-update')" files>
        <x-cms.card title="Header image">
            <x-cms.file-input name="image" label="Header image" :current="$travel->header_image" />
        </x-cms.card>

        <x-cms.card title="Header text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$travel->header_caption" />
                <x-cms.editor name="body" label="Body" :value="$travel->header_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
