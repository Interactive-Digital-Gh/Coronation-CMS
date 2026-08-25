<x-cms-layout title="Board of Directors"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Board of Directors' => null]"
              preview="https://coronation.com.gh/purpleabout">
    <x-slot:actions>
        <a href="{{ route('about-create-bod') }}" class="btn-primary">
            <x-cms.icon name="plus" class="h-4 w-4" />
            Add board member
        </a>
    </x-slot:actions>

    <x-cms.card title="All board members" flush>
        @if (count($bods) === 0)
            <x-cms.empty-state title="No board members yet"
                               description="Board members you add here appear on the About page."
                               :action="route('about-create-bod')" action-label="Add board member" />
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">Member</th>
                            <th class="table-th">Title</th>
                            <th class="table-th">Added</th>
                            <th class="table-th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($bods as $bod)
                            <tr>
                                <td class="table-td">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ cms_asset($bod->image) }}" alt="" class="h-9 w-9 rounded-full bg-gray-100 object-cover">
                                        <span class="font-medium text-gray-900">{{ $bod->name }}</span>
                                    </div>
                                </td>
                                <td class="table-td">{{ $bod->title }}</td>
                                <td class="table-td text-gray-500">{{ $bod->created_at?->format('j M Y') }}</td>
                                <td class="table-td text-right">
                                    <x-cms.dropdown>
                                        <a href="{{ route('about-sec5-edit', ['id' => $bod->id]) }}" class="menu-item">Edit</a>
                                        <x-cms.delete-button :action="route('about-sec5-delete', ['id' => $bod->id])" confirm="Delete {{ $bod->name }}?" />
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
