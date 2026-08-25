<x-cms-layout title="Add Executive Member"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Executive Members' => route('executive-table'), 'Add Executive Member' => null]">
    <x-cms.form :action="route('store-executive-member')" files>
        <x-cms.card title="Member photo">
            <x-cms.file-input name="image" label="Member photo" required />
        </x-cms.card>

        <x-cms.card title="Member details">
            <x-cms.input name="name" label="Member name" required />
            <x-cms.editor name="body" label="Member description" class="mt-6" />
        </x-cms.card>

        <x-cms.submit label="Add member" />
    </x-cms.form>
</x-cms-layout>
