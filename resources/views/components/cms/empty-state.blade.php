@props(['title' => 'Nothing here yet', 'description' => null, 'action' => null, 'actionLabel' => null])
<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center px-6 py-16 text-center']) }}>
    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-gray-400">
        <x-cms.icon name="inbox" class="h-6 w-6" />
    </div>
    <h3 class="mt-4 text-sm font-semibold text-gray-900">{{ $title }}</h3>
    @if ($description)
        <p class="mt-1 max-w-sm text-sm text-gray-500">{{ $description }}</p>
    @endif
    @if ($action)
        <a href="{{ $action }}" class="btn-primary mt-6">{{ $actionLabel ?? 'Add one' }}</a>
    @endif
</div>
