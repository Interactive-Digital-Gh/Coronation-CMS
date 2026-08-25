<x-cms-layout title="Motor Insurance Benefits"
              :breadcrumbs="['Individual' => null, 'Products & Solutions' => route('pns-header'), 'Motor Insurance Benefits' => null]"
              preview="https://coronation.com.gh/">
    <x-cms.form :action="route('motor-update-benefits')">
        <x-cms.card title="Benefits body">
            <x-cms.editor name="benefit_body" label="Body" :value="$motor->benefits_body" />
        </x-cms.card>

        <x-cms.card title="Benefits">
            <div class="grid gap-6 lg:grid-cols-2">
                <x-cms.editor name="comprehensive_benefits" label="Comprehensive" :value="$motor->comprehensive_ins_benefits" />
                <x-cms.editor name="third_party" label="Third party fire and theft" :value="$motor->tp_fire_theft_benefits" />
            </div>
        </x-cms.card>

        <x-cms.submit name="submit" value="submit" />
    </x-cms.form>
</x-cms-layout>
