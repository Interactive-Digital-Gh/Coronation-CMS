<x-cms-layout title="Contact Header"
              :breadcrumbs="['Individual' => null, 'Contact' => route('contact-header'), 'Header' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('contact-header-update')" files>
        <x-cms.card title="Header image">
            <x-cms.file-input name="image" label="Header image" :current="$contact->header_image" />
        </x-cms.card>

        <x-cms.card title="Header text">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Caption" :value="$contact->header_caption" />
                <x-cms.editor name="body" label="Body" :value="$contact->header_body" />
            </div>
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
