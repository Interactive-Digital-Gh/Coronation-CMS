<x-cms-layout title="Travel Insurance Benefits"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Travel Insurance Benefits' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('travel-update-benefits')" files>
        <x-cms.card title="Benefits image">
            <x-cms.file-input name="image" label="Benefits image" :current="$travel->benefits_image" />
        </x-cms.card>

        <x-cms.card title="Benefits">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="benefits_body" label="Benefits body" :value="$travel->benefits_body" />
                <x-cms.editor name="benefits" label="Benefits" :value="$travel->travel_benefits" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" value="submit" />
    </x-cms.form>
</x-cms-layout>
