@props(['name', 'label' => null, 'value' => '', 'full' => false])
@php $id = 'editor-'.$name.'-'.\Illuminate\Support\Str::random(6); @endphp
<div {{ $attributes }}>
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <textarea id="{{ $id }}" name="{{ $name }}" data-editor="{{ $full ? 'full' : 'simple' }}" class="form-input" rows="8">{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

@once
    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea[data-editor="simple"]',
                height: 260,
                menubar: false,
                statusbar: false,
                branding: false,
                plugins: 'lists link table code',
                toolbar: 'undo redo | bold italic | bullist numlist | link table | code',
                content_style: 'body { font-family: Inter, sans-serif; font-size: 14px; }',
            });

            tinymce.init({
                selector: 'textarea[data-editor="full"]',
                height: 700,
                branding: false,
                plugins: 'advlist autolink link image lists charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table emoticons help',
                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image media table | code fullscreen',
                content_style: 'body { font-family: Inter, sans-serif; font-size: 15px; }',
            });
        </script>
    @endpush
@endonce
