import InsuranceProductPage from '@/Components/InsuranceProductPage';

const variants = [
    {
        value: 'student',
        label: 'Students',
        images: [
            { field: 'image', column: 'student_ins_image', label: 'Card image' },
            { field: 'feature_image', column: 'student_feature_image', label: 'Feature image' },
        ],
        body: 'student_insurance_body',
        features: 'student_insurance_features',
    },
    {
        value: 'individual',
        label: 'Individuals',
        images: [
            { field: 'image', column: 'individual_ins_image', label: 'Card image' },
            { field: 'feature_image', column: 'individual_feature_image', label: 'Feature image' },
        ],
        body: 'individual_insurance_body',
        features: 'individual_insurance_features',
    },
];

export default function TravelInsurancePage({ travel }) {
    return (
        <InsuranceProductPage
            title="Travel Insurance Page"
            breadcrumbs={['Individual', 'Travel Insurance', 'Page']}
            action={route('travel-update')}
            record={travel}
            variants={variants}
        />
    );
}
