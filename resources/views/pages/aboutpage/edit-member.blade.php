<x-cms-layout title="Edit Board Member"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Board of Directors' => route('about-sec5'), 'Edit Board Member' => null]">
    <x-cms.form :action="route('about-sec5-update', ['id' => $bod->id])" files>
        <x-cms.card title="Member photo">
            <x-cms.file-input name="image" label="Member photo" :current="$bod->image" />
        </x-cms.card>

        <x-cms.card title="Member details">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.input name="name" label="Member name" :value="$bod->name" required />
                <x-cms.input name="title" label="Member title" :value="$bod->title" required />
            </div>
            <x-cms.editor name="body" label="Body" :value="$bod->body" class="mt-6" />
        </x-cms.card>

        <x-cms.submit />
    </x-cms.form>
</x-cms-layout>
