@php
    $country = request('country') === 'ng' ? 'ng' : 'gh';
    $isGhana = $country === 'gh';
@endphp
<x-cms-layout title="Contact Details"
              :breadcrumbs="['Individual' => null, 'Contact' => route('contact-header'), 'Contact Details' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('contact-update')" files>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-lg font-semibold text-gray-900">{{ $isGhana ? 'Ghana' : 'Nigeria' }} contact</h2>
            <x-cms.tabs param="country" :tabs="['gh' => 'Ghana', 'ng' => 'Nigeria']" />
        </div>

        <x-cms.card title="{{ $isGhana ? 'Ghana' : 'Nigeria' }} contact details">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.input name="number" label="Phone number(s)" :value="$isGhana ? $contact->gh_call_no : $contact->ng_call_no" />
                <x-cms.input name="email" label="Email" :value="$isGhana ? $contact->gh_email : $contact->ng_email" />
                <x-cms.input name="location" label="Head office location" :value="$isGhana ? $contact->gh_headoffice : $contact->ng_headoffice" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" :value="$country" />
    </x-cms.form>
</x-cms-layout>
