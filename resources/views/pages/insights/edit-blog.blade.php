<x-cms-layout title="Edit Blog"
              :breadcrumbs="['Individual' => null, 'Insights' => route('blogs-all'), 'Edit Blog' => null]">
    <x-cms.form :action="route('update-blog', ['id' => $blog->id])" files>
        <div class="grid gap-6 lg:grid-cols-2">
            <x-cms.card title="Cover image">
                <x-cms.file-input name="main_image" label="Cover image" :current="$blog->main_image" />
            </x-cms.card>
            <x-cms.card title="Article PDF">
                <x-cms.file-input name="pdf_file" label="Article PDF" accept="application/pdf" :max-kb="10240" :current="$blog->pdf_file" />
            </x-cms.card>
        </div>

        <x-cms.card title="Content">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="caption" label="Blog caption" :value="$blog->caption" />
                <x-cms.editor name="excerpt" label="Blog excerpt" :value="$blog->excerpt" />
            </div>
            <x-cms.editor name="body" label="Blog body" full class="mt-6" :value="$blog->body" />
        </x-cms.card>

        <x-cms.card title="Category">
            <x-cms.input name="category" label="Blog category" placeholder="e.g. Insurance" :value="ucfirst($blog->category)" required />
        </x-cms.card>

        <x-cms.submit name="submit" value="" />
    </x-cms.form>
</x-cms-layout>
