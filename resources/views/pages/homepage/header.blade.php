<x-cms-layout title="Homepage Header"
              :breadcrumbs="['Individual' => null, 'Homepage' => route('home-header'), 'Header' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('home-header-update')" files>
        <x-cms.card title="Header image">
            <x-cms.file-input name="image" label="Header image" :current="$home_header->header_image" />
        </x-cms.card>

        <x-cms.card title="Header text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$home_header->header_caption" />
                <x-cms.editor name="body" label="Body" :value="$home_header->header_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
