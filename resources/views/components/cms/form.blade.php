@props(['action', 'method' => 'POST', 'files' => false])
<form action="{{ $action }}" method="POST" @if ($files) enctype="multipart/form-data" @endif
      x-data="{ saving: false }" @submit="saving = true"
      {{ $attributes->merge(['class' => 'space-y-6']) }}>
    @csrf
    @unless (in_array(strtoupper($method), ['GET', 'POST']))
        @method($method)
    @endunless
    {{ $slot }}
</form>
