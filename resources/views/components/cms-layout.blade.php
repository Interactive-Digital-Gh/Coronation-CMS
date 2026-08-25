@props(['title' => 'Coronation CMS', 'breadcrumbs' => [], 'preview' => null, 'description' => null])
<!doctype html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · Coronation CMS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
    @stack('head')
</head>
<body class="h-full font-sans text-gray-800 antialiased" x-data="{ sidebarOpen: false }">
    <x-cms.sidebar />

    <div class="flex min-h-full flex-col lg:pl-64">
        <x-cms.topbar />

        <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                <div class="min-w-0">
                    <x-cms.breadcrumbs :items="$breadcrumbs" />
                    <h1 class="mt-2 text-2xl font-semibold tracking-tight text-gray-900">{{ $title }}</h1>
                    @if ($description)
                        <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
                    @endif
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    @isset($actions)
                        {{ $actions }}
                    @endisset
                    @if ($preview)
                        <a href="{{ $preview }}" target="_blank" rel="noopener" class="btn-secondary">
                            Preview on site
                            <x-cms.icon name="external" class="h-4 w-4 text-gray-400" />
                        </a>
                    @endif
                </div>
            </div>

            {{ $slot }}
        </main>

        <footer class="px-4 py-6 text-center text-xs text-gray-400 sm:px-6 lg:px-8">
            Coronation Insurance &middot; Interactive Digital
        </footer>
    </div>

    <x-cms.toasts />
    @stack('scripts')
</body>
</html>
