<header class="sticky top-0 z-20 flex h-16 items-center gap-4 border-b border-gray-200 bg-white/90 px-4 backdrop-blur sm:px-6 lg:px-8">
    <button type="button" class="-ml-1 rounded-md p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-700 lg:hidden" @click="sidebarOpen = true" aria-label="Open menu">
        <x-cms.icon name="menu" class="h-6 w-6" />
    </button>

    <div class="flex-1"></div>

    <div x-data="{ open: false }" class="relative">
        <button type="button" @click="open = !open" @keydown.escape.window="open = false" :aria-expanded="open"
                class="flex items-center gap-2 rounded-full py-1 pl-1 pr-3 text-sm font-medium text-gray-700 hover:bg-gray-100">
            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-100 text-sm font-semibold text-brand-700">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </span>
            <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
            <x-cms.icon name="chevron" class="h-4 w-4 rotate-90 text-gray-400" />
        </button>

        <div x-show="open" x-cloak x-transition @click.outside="open = false"
             class="absolute right-0 mt-2 w-48 overflow-hidden rounded-lg border border-gray-200 bg-white py-1 shadow-lg">
            <div class="border-b border-gray-100 px-4 py-2">
                <p class="truncate text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                <p class="truncate text-xs text-gray-500">{{ Auth::user()->email }}</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="menu-item">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu-item">Log out</button>
            </form>
        </div>
    </div>
</header>
