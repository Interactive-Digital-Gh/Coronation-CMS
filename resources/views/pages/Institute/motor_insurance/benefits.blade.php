<x-cms-layout title="Institute Motor Insurance Benefits"
              :breadcrumbs="['Institute' => null, 'Products & Solutions' => route('institute-pns-header'), 'Motor Insurance Benefits' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('institute-motor-benefits-update')">
        <x-cms.card title="Benefits body">
            <x-cms.editor name="benefit_body" label="Body" :value="$motor->benefit_body" />
        </x-cms.card>

        <x-cms.card title="Benefits">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="comprehensive_benefits" label="Comprehensive insurance" :value="$motor->comprehensive_benefits" />
                <x-cms.editor name="third_party" label="Third party fire and theft insurance" :value="$motor->tp_fire_theft_benefits" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" value="submit" />
    </x-cms.form>
</x-cms-layout>
