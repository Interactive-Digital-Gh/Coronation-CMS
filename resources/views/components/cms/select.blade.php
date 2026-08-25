@props(['name', 'label' => null, 'hint' => null])
@php $id = $name.'-'.\Illuminate\Support\Str::random(6); @endphp
<div {{ $attributes }}>
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <select id="{{ $id }}" name="{{ $name }}" class="form-input">
        {{ $slot }}
    </select>
    @if ($hint)
        <p class="form-hint">{{ $hint }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
