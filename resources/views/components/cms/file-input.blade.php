@props(['name', 'label' => 'Image', 'current' => null, 'accept' => 'image/*', 'hint' => null, 'required' => false, 'maxKb' => null])
@php
    $id = $name.'-'.\Illuminate\Support\Str::random(6);
    $maxKb = (int) ($maxKb ?? config('uploads.max_image_kb'));
    $maxLabel = $maxKb % 1024 === 0 ? $maxKb / 1024 : round($maxKb / 1024, 1);
    $isImage = str_starts_with($accept, 'image');
@endphp
<div x-data="fileInput({{ $maxKb }})" {{ $attributes }}>
    <span class="form-label">{{ $label }}</span>
    <div class="flex items-start gap-4">
        @if ($isImage)
            <div class="relative h-20 w-28 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100">
                <template x-if="preview">
                    <img :src="preview" class="h-full w-full object-cover" alt="New image preview">
                </template>
                <template x-if="!preview">
                    @if ($current)
                        <a href="{{ cms_asset($current) }}" target="_blank" rel="noopener" title="Open current image">
                            <img src="{{ cms_asset($current) }}" class="h-full w-full object-cover" alt="Current image">
                        </a>
                    @else
                        <div class="flex h-full items-center justify-center text-gray-400">
                            <x-cms.icon name="image" class="h-6 w-6" />
                        </div>
                    @endif
                </template>
            </div>
        @endif

        <div class="min-w-0 flex-1">
            <label for="{{ $id }}" class="btn-secondary cursor-pointer">
                <x-cms.icon name="upload" class="h-4 w-4 text-gray-400" />
                <span x-text="fileName ? 'Change file' : 'Choose file'">Choose file</span>
            </label>
            <input id="{{ $id }}" type="file" name="{{ $name }}" accept="{{ $accept }}" class="sr-only" @change="changed" @required($required)>

            <p class="mt-2 truncate text-sm text-gray-700" x-show="fileName" x-cloak>
                <span x-text="fileName"></span>
                <span class="text-gray-400" x-text="'(' + fileSize + ')'"></span>
            </p>
            <p class="form-hint" x-show="!fileName">
                {{ $hint ?? ($isImage ? 'JPG, PNG, GIF or WebP' : 'PDF') }} &middot; up to {{ $maxLabel }} MB.
                @if ($current)
                    <a href="{{ cms_asset($current) }}" target="_blank" rel="noopener" class="text-brand-600 hover:underline">View current</a>
                @endif
            </p>
            <p class="form-error" x-show="error" x-text="error" x-cloak></p>
            @error($name)
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
