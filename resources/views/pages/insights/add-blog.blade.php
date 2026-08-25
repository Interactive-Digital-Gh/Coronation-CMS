<x-cms-layout title="Add New Blog"
              :breadcrumbs="['Individual' => null, 'Insights' => route('blogs-all'), 'Add New Blog' => null]">
    <x-cms.form :action="route('submit-blog')" files>
        <div class="grid gap-6 lg:grid-cols-2">
            <x-cms.card title="Cover image">
                <x-cms.file-input name="main_image" label="Cover image" required />
            </x-cms.card>
            <x-cms.card title="Article PDF">
                <x-cms.file-input name="pdf_file" label="Article PDF" accept="application/pdf" :max-kb="10240" required />
            </x-cms.card>
        </div>

        <x-cms.card title="Content">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Blog caption" />
                <x-cms.editor name="excerpt" label="Blog excerpt" />
            </div>
            <x-cms.editor name="body" label="Blog body" full class="mt-6" />
        </x-cms.card>

        <x-cms.card title="Category" description="Type a new category, or pick an existing one.">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.input name="new_category" label="New category" placeholder="e.g. Insurance" />
                <x-cms.select name="existing_category" label="Existing category">
                    @foreach ($categories as $category)
                        <option value="{{ ucfirst($category->category) }}" @selected(old('existing_category') == ucfirst($category->category))>{{ ucfirst($category->category) }}</option>
                    @endforeach
                </x-cms.select>
            </div>
        </x-cms.card>

        <x-cms.submit label="Save blog" />
    </x-cms.form>
</x-cms-layout>
