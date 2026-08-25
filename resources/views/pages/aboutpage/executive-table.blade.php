<x-cms-layout title="Executive Members"
              :breadcrumbs="['Individual' => null, 'About Page' => route('about-header'), 'Executive Members' => null]"
              preview="https://coronation.com.gh/purpleabout">
    <x-slot:actions>
        <a href="{{ route('create-executive-member') }}" class="btn-primary">
            <x-cms.icon name="plus" class="h-4 w-4" />
            Add executive member
        </a>
    </x-slot:actions>

    <x-cms.card title="All executive members" flush>
        @if (count($executives) === 0)
            <x-cms.empty-state title="No executive members yet"
                               description="Executive members you add here appear on the About page."
                               :action="route('create-executive-member')" action-label="Add executive member" />
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">Member</th>
                            <th class="table-th">Added</th>
                            <th class="table-th">Updated</th>
                            <th class="table-th"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($executives as $executive)
                            <tr>
                                <td class="table-td">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ cms_asset($executive->image) }}" alt="" class="h-9 w-9 rounded-full bg-gray-100 object-cover">
                                        <span class="font-medium text-gray-900">{{ $executive->name }}</span>
                                    </div>
                                </td>
                                <td class="table-td text-gray-500">{{ $executive->created_at?->format('j M Y') }}</td>
                                <td class="table-td text-gray-500">{{ $executive->updated_at?->format('j M Y') }}</td>
                                <td class="table-td text-right">
                                    <x-cms.dropdown>
                                        <a href="{{ route('edit-executive-member', ['id' => $executive->id]) }}" class="menu-item">Edit</a>
                                        <x-cms.delete-button :action="route('delete-executive-member', ['id' => $executive->id])" confirm="Delete {{ $executive->name }}?" />
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
