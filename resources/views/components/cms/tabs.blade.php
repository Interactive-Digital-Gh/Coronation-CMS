{{-- Query-string switcher, e.g. <x-cms.tabs param="type" :tabs="['homeowner' => 'Homeowners', 'householder' => 'Householders']" /> --}}
@props(['param', 'tabs'])
@php $current = request($param, array_key_first($tabs)); @endphp
<nav {{ $attributes->merge(['class' => 'inline-flex gap-1 rounded-lg bg-gray-100 p-1']) }} aria-label="Sections">
    @foreach ($tabs as $value => $label)
        <a href="{{ request()->fullUrlWithQuery([$param => $value]) }}" @if ($current == $value) aria-current="page" @endif
           @class(['rounded-md px-4 py-1.5 text-sm font-medium transition', 'bg-white text-gray-900 shadow-sm' => $current == $value, 'text-gray-600 hover:text-gray-900' => $current != $value])>
            {{ $label }}
        </a>
    @endforeach
</nav>
