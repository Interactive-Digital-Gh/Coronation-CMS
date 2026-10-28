import InsuranceProductPage from '@/Components/InsuranceProductPage';

const variants = [
    {
        value: 'cargo',
        label: 'Marine Cargo',
        images: [{ field: 'image', column: 'marine_cargo_features_image', label: 'Feature image' }],
        body: 'marine_cargo_body',
        features: 'marine_cargo_features',
    },
    {
        value: 'hull',
        label: 'Marine Hull',
        images: [{ field: 'image', column: 'marine_hull_features_image', label: 'Feature image' }],
        body: 'marine_hull_body',
        features: 'marine_hull_features',
    },
];

export default function InstituteMarineInsurancePage({ marine }) {
    return (
        <InsuranceProductPage
            title="Marine Insurance details"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Marine Insurance', 'Product details']}
            description="The cover types and their details on the Corporate Marine Insurance page."
            action={route('institute-marine-update')}
            record={marine}
            bodyField="insurance_body"
            variants={variants}
        />
    );
}
