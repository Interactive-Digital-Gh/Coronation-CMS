{{-- Row actions menu. Put <a class="menu-item"> / <x-cms.delete-button> items in the slot. --}}
<div x-data="{ open: false }" {{ $attributes->merge(['class' => 'relative inline-block text-left']) }}>
    <button type="button" @click="open = !open" @keydown.escape.window="open = false" :aria-expanded="open"
            class="rounded-md p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-700" aria-label="Actions">
        <x-cms.icon name="dots" class="h-5 w-5" />
    </button>
    <div x-show="open" x-cloak x-transition @click.outside="open = false"
         class="absolute right-0 z-10 mt-1 w-40 overflow-hidden rounded-lg border border-gray-200 bg-white py-1 shadow-lg">
        {{ $slot }}
    </div>
</div>
