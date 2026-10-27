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
            title="Institute Motor Insurance Page"
            breadcrumbs={['Institute', 'Motor Insurance', 'Page']}
            action={route('institute-motor-section1-update')}
            record={motor}
            sectionImage={{ field: 'image', column: 'sec1_image', label: 'Background image' }}
            variants={variants}
        />
    );
}
