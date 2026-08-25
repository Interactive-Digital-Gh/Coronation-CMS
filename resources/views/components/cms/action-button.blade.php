{{-- A POST action rendered as a menu item (e.g. publish/unpublish). --}}
@props(['action', 'method' => 'POST'])
<form method="POST" action="{{ $action }}" {{ $attributes }}>
    @csrf
    @unless (in_array(strtoupper($method), ['GET', 'POST']))
        @method($method)
    @endunless
    <button type="submit" class="menu-item">{{ $slot }}</button>
</form>
