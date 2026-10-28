import InsuranceProductPage from '@/Components/InsuranceProductPage';

const variants = [
    {
        value: 'comp',
        label: 'Comprehensive Insurance',
        images: [{ field: 'feature_image', column: 'compliance_ins_feature_image', label: 'Features image' }],
        body: 'compliance_ins_body',
        features: 'compliance_ins_features',
    },
    {
        value: 'tpft',
        label: 'Third Party Fire and Theft',
        images: [{ field: 'feature_image', column: 'tp_fire_theft_features_image', label: 'Features image' }],
        body: 'tp_fire_theft_body',
        features: 'tp_fire_theft_features',
    },
    {
        value: 'tpo',
        label: 'Third Party Only',
        images: [{ field: 'feature_image', column: 'tp_only_features_image', label: 'Features image' }],
        body: 'tp_only_body',
        features: 'tp_only_features',
    },
];

export default function MotorInsurancePage({ motor }) {
    return (
        <InsuranceProductPage
            title="Motor Insurance details"
            breadcrumbs={['Personal', 'Products & Solutions', 'Motor Insurance', 'Product details']}
            description="The cover types and their details on the Motor Insurance page."
            action={route('motor-update')}
            record={motor}
            sectionImage={{ field: 'image', column: 'sec1_image', label: 'Background image' }}
            variants={variants}
        />
    );
}
