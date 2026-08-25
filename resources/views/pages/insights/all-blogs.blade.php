<x-cms-layout title="All Blogs"
              :breadcrumbs="['Individual' => null, 'Insights' => route('blogs-all'), 'All Blogs' => null]">
    <x-slot:actions>
        <a href="{{ route('add-blog') }}" class="btn-primary">
            <x-cms.icon name="plus" class="h-4 w-4" />
            Add new blog
        </a>
    </x-slot:actions>

    <x-cms.card flush>
        @if (count($blogs) === 0)
            <x-cms.empty-state title="No blogs yet"
                               description="Blogs you add here appear under Insights on the site once published."
                               :action="route('add-blog')" action-label="Add new blog" />
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">Blog</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Added</th>
                            <th class="table-th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($blogs as $blog)
                            <tr>
                                <td class="table-td">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ cms_asset($blog->main_image) }}" alt="" class="h-10 w-14 rounded-md bg-gray-100 object-cover">
                                        <div class="max-w-md font-medium text-gray-900 [&_p]:m-0">{!! $blog->caption !!}</div>
                                    </div>
                                </td>
                                <td class="table-td">
                                    @if ($blog->publish)
                                        <x-cms.badge color="green">Published</x-cms.badge>
                                    @else
                                        <x-cms.badge>Draft</x-cms.badge>
                                    @endif
                                </td>
                                <td class="table-td text-gray-500">{{ $blog->created_at?->format('j M Y') }}</td>
                                <td class="table-td text-right">
                                    <x-cms.dropdown>
                                        <x-cms.action-button :action="route('publish-blog', ['id' => $blog->id])">
                                            {{ $blog->publish ? 'Unpublish' : 'Publish' }}
                                        </x-cms.action-button>
                                        <a href="{{ route('edit-blog', ['id' => $blog->id]) }}" class="menu-item">Edit</a>
                                        <x-cms.delete-button :action="route('delete-blog', ['id' => $blog->id])" confirm="Delete this blog?" />
                                    </x-cms.dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-cms.card>
</x-cms-layout>
