@php
    $toasts = [];
    if (session('success')) {
        $toasts[] = ['type' => 'success', 'message' => session('success')];
    }
    if (session('error')) {
        $toasts[] = ['type' => 'error', 'message' => session('error')];
    }
    foreach ($errors->all() as $message) {
        $toasts[] = ['type' => 'error', 'message' => $message];
    }
@endphp
<div x-data="toasts(@js($toasts))" class="pointer-events-none fixed inset-x-0 top-20 z-50 flex flex-col items-center gap-2 px-4 sm:items-end sm:px-6" aria-live="polite">
    <template x-for="toast in items" :key="toast.id">
        <div x-transition class="pointer-events-auto flex w-full max-w-sm items-start gap-3 rounded-lg border bg-white p-4 shadow-lg"
             :class="toast.type === 'success' ? 'border-green-200' : 'border-red-200'">
            <span class="mt-0.5 shrink-0" :class="toast.type === 'success' ? 'text-green-600' : 'text-red-600'">
                <template x-if="toast.type === 'success'"><x-cms.icon name="check-circle" class="h-5 w-5" /></template>
                <template x-if="toast.type !== 'success'"><x-cms.icon name="alert" class="h-5 w-5" /></template>
            </span>
            <p class="flex-1 text-sm text-gray-800" x-text="toast.message"></p>
            <button type="button" class="shrink-0 text-gray-400 hover:text-gray-600" @click="remove(toast.id)" aria-label="Dismiss">
                <x-cms.icon name="x" class="h-4 w-4" />
            </button>
        </div>
    </template>
</div>
