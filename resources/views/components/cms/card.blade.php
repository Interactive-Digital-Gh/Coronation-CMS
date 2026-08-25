@props(['title' => null, 'description' => null, 'flush' => false])
<section {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm']) }}>
    @if ($title || $description)
        <header class="border-b border-gray-100 px-6 py-4">
            @if ($title)
                <h2 class="text-base font-semibold text-gray-900">{{ $title }}</h2>
            @endif
            @if ($description)
                <p class="mt-0.5 text-sm text-gray-500">{{ $description }}</p>
            @endif
        </header>
    @endif
    <div @class(['p-6' => ! $flush])>
        {{ $slot }}
    </div>
</section>
