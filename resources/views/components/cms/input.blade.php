@props(['name', 'label' => null, 'value' => '', 'type' => 'text', 'placeholder' => null, 'required' => false, 'hint' => null])
@php $id = $name.'-'.\Illuminate\Support\Str::random(6); @endphp
<div {{ $attributes }}>
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
           @if ($placeholder) placeholder="{{ $placeholder }}" @endif @required($required) class="form-input">
    @if ($hint)
        <p class="form-hint">{{ $hint }}</p>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
