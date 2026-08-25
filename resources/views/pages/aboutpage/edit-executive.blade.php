<x-cms-layout title="Edit Executive Member"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Executive Members' => route('executive-table'), 'Edit Executive Member' => null]">
    <x-cms.form :action="route('update-executive-member', ['id' => $executive->id])" files>
        <x-cms.card title="Member photo">
            <x-cms.file-input name="image" label="Member photo" :current="$executive->image" />
        </x-cms.card>

        <x-cms.card title="Member details">
            <x-cms.input name="name" label="Member name" :value="$executive->name" required />
            <x-cms.editor name="body" label="Member description" :value="$executive->description" class="mt-6" />
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
