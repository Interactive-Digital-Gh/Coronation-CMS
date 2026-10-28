import InsuranceProductPage from '@/Components/InsuranceProductPage';

const variants = [
    {
        value: 'homeowner',
        label: 'Homeowners',
        images: [
            { field: 'image', column: 'homeowner_ins_image', label: 'Card image' },
            { field: 'feature_image', column: 'homeowner_feature_image', label: 'Feature image' },
        ],
        body: 'homeowner_ins_body',
        features: 'homeowner_ins_features',
    },
    {
        value: 'householder',
        label: 'Householders',
        images: [
            { field: 'image', column: 'householder_ins_image', label: 'Card image' },
            { field: 'feature_image', column: 'householder_feature_image', label: 'Feature image' },
        ],
        body: 'householder_ins_body',
        features: 'householder_ins_features',
    },
];

export default function HomeInsurancePage({ home }) {
    return (
        <InsuranceProductPage
            title="Home Insurance details"
            breadcrumbs={['Personal', 'Products & Solutions', 'Home Insurance', 'Product details']}
            description="The cover types and their details on the Home Insurance page."
            action={route('house-update')}
            record={home}
            variants={variants}
        />
    );
}
