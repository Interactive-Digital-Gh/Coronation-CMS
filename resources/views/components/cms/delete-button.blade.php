{{-- Deletes via DELETE with an inline confirm (no browser dialog). --}}
@props(['action', 'label' => 'Delete', 'confirm' => 'Delete this?'])
<form method="POST" action="{{ $action }}" x-data="{ confirming: false }" {{ $attributes }}>
    @csrf
    @method('DELETE')
    <button type="button" x-show="!confirming" @click="confirming = true" class="menu-item text-red-600 hover:bg-red-50">{{ $label }}</button>
    <div x-show="confirming" x-cloak class="flex items-center justify-between gap-2 px-4 py-2 text-sm">
        <span class="text-gray-700">{{ $confirm }}</span>
        <span class="flex gap-2">
            <button type="submit" class="font-semibold text-red-600 hover:underline">Yes</button>
            <button type="button" @click="confirming = false" class="text-gray-500 hover:underline">No</button>
        </span>
    </div>
</form>
