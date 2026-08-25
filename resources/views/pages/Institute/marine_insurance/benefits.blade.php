<x-cms-layout title="Institute Marine Insurance Benefits"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Marine Insurance Benefits' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-marine-benefits-update')" files>
        <x-cms.card title="Benefits image">
            <x-cms.file-input name="image" label="Benefits image" :current="$marine->benefits_image" />
        </x-cms.card>

        <x-cms.card title="Benefits">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="benefits_body" label="Benefits body" :value="$marine->benefits_body" />
                <x-cms.editor name="benefits" label="Benefits" :value="$marine->marine_benefits" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" value="submit" />
    </x-cms.form>
</x-cms-layout>
