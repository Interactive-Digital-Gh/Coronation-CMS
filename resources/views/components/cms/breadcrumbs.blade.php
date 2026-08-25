@props(['items' => []])
@if (count($items))
    <nav aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-1.5 text-sm text-gray-500">
            @foreach ($items as $label => $url)
                <li class="flex items-center gap-1.5">
                    @if ($url && ! $loop->last)
                        <a href="{{ $url }}" class="hover:text-gray-900">{{ $label }}</a>
                    @else
                        <span @if ($loop->last) class="text-gray-900" aria-current="page" @endif>{{ $label }}</span>
                    @endif
                    @unless ($loop->last)
                        <x-cms.icon name="chevron" class="h-3.5 w-3.5 text-gray-300" />
                    @endunless
                </li>
            @endforeach
        </ol>
    </nav>
@endif
