{{-- Sidebar navigation driven by config/cms-nav.php. The group containing the current route starts open. --}}
<div x-show="sidebarOpen" x-transition.opacity x-cloak class="fixed inset-0 z-30 bg-gray-900/60 lg:hidden" @click="sidebarOpen = false"></div>

<aside class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col bg-gray-900 text-gray-300 transition-transform duration-200 lg:translate-x-0"
       :class="sidebarOpen && 'translate-x-0'" aria-label="Main navigation">
    <div class="flex h-16 shrink-0 items-center justify-between px-5">
        <a href="{{ route('home-header') }}" class="flex items-center">
            <img src="{{ asset('assets/images/coronation-logo.png') }}" alt="Coronation" class="h-5 w-auto brightness-0 invert">
        </a>
        <button type="button" class="rounded-md p-1 text-gray-400 hover:text-white lg:hidden" @click="sidebarOpen = false" aria-label="Close menu">
            <x-cms.icon name="x" class="h-5 w-5" />
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 pb-6">
        @foreach (config('cms-nav') as $section)
            <p class="px-3 pb-2 pt-5 text-[11px] font-semibold uppercase tracking-wider text-gray-500">{{ $section['label'] }}</p>

            @foreach ($section['groups'] as $group)
                @php
                    $groupActive = collect($group['children'])->contains(
                        fn ($child) => isset($child['route']) && request()->routeIs($child['route'], ...($child['also'] ?? []))
                    );
                @endphp
                <div x-data="{ open: @js($groupActive) }" class="mb-0.5">
                    <button type="button" @click="open = !open" :aria-expanded="open"
                            @class(['flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition hover:bg-gray-800 hover:text-white', 'text-white' => $groupActive])>
                        <x-cms.icon :name="$group['icon']" class="h-4 w-4 shrink-0 text-gray-500" />
                        <span class="flex-1 text-left">{{ $group['label'] }}</span>
                        <x-cms.icon name="chevron" class="h-4 w-4 text-gray-500 transition-transform" ::class="open && 'rotate-90'" />
                    </button>

                    <div x-show="open" x-cloak class="mt-0.5 space-y-0.5 pb-1 pl-4">
                        @foreach ($group['children'] as $child)
                            @if (isset($child['heading']))
                                <p class="px-3 pb-1 pt-3 text-[11px] font-semibold uppercase tracking-wider text-gray-500">{{ $child['heading'] }}</p>
                            @else
                                @php $current = request()->routeIs($child['route'], ...($child['also'] ?? [])); @endphp
                                <a href="{{ route($child['route']) }}" @if ($current) aria-current="page" @endif
                                   @class(['block rounded-lg px-3 py-1.5 text-sm transition', 'bg-brand-600 font-medium text-white' => $current, 'text-gray-400 hover:bg-gray-800 hover:text-white' => ! $current])>
                                    {{ $child['label'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endforeach
    </nav>
</aside>
