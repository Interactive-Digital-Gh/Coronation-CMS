<x-cms-layout title="Add Board Member"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Board of Directors' => route('about-sec5'), 'Add Board Member' => null]">
    <x-cms.form :action="route('about-sec5-store')" files>
        <x-cms.card title="Member photo">
            <x-cms.file-input name="image" label="Member photo" required />
        </x-cms.card>

        <x-cms.card title="Member details">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.input name="name" label="Member name" required />
                <x-cms.input name="title" label="Member title" required />
            </div>
            <x-cms.editor name="body" label="Body" class="mt-6" />
        </x-cms.card>

        <x-cms.submit label="Add member" />
    </x-cms.form>
</x-cms-layout>
