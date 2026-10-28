import InsuranceProductPage from '@/Components/InsuranceProductPage';

const variants = [
    {
        value: 'comp',
        label: 'Comprehensive Insurance',
        images: [{ field: 'background_image', column: 'comprehensive_ins_image', label: 'Feature image' }],
        body: 'comprehensive_ins_body',
        features: 'comprehensive_ins_features',
    },
    {
        value: 'tpft',
        label: 'Third Party Fire and Theft',
        images: [{ field: 'background_image', column: 'tp_fire_theft_image', label: 'Feature image' }],
        body: 'tp_fire_theft_body',
        features: 'tp_fire_theft_features',
    },
    {
        value: 'tpo',
        label: 'Third Party Only',
        images: [{ field: 'background_image', column: 'tp_only_image', label: 'Feature image' }],
        body: 'tp_only_body',
        features: 'tp_only_features',
    },
];

export default function InstituteMotorInsurancePage({ motor }) {
    return (
        <InsuranceProductPage
            title="Motor Insurance details"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Motor Insurance', 'Product details']}
            description="The cover types and their details on the Corporate Motor Insurance page."
            action={route('institute-motor-section1-update')}
            record={motor}
            sectionImage={{ field: 'image', column: 'sec1_image', label: 'Background image' }}
            variants={variants}
        />
    );
}
