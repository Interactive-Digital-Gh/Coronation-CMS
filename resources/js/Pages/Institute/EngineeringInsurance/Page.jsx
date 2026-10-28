import InsuranceProductPage from '@/Components/InsuranceProductPage';

const variants = [
    {
        value: 'plant',
        label: 'Plant All-Risk',
        images: [
            { field: 'image', column: 'plant_all_risk_image', label: 'Card image' },
            { field: 'feature_image', column: 'plant_all_risk_features_image', label: 'Feature image' },
        ],
        body: 'plant_all_risk_body',
        features: 'plant_all_risk_features',
    },
    {
        value: 'contractors',
        label: 'Contractors All-Risk',
        images: [
            { field: 'image', column: 'contractors_all_risk_image', label: 'Card image' },
            { field: 'feature_image', column: 'contractors_all_risk_features_image', label: 'Feature image' },
        ],
        body: 'contractors_all_risk_body',
        features: 'contractors_all_risk_features',
    },
    {
        value: 'machinery',
        label: 'Machinery Breakdown',
        images: [
            { field: 'image', column: 'machinery_breakdown_image', label: 'Card image' },
            { field: 'feature_image', column: 'machinery_breakdown_features_image', label: 'Feature image' },
        ],
        body: 'machinery_breakdown_body',
        features: 'machinery_breakdown_features',
    },
    {
        value: 'erection',
        label: 'Erection All-Risk',
        images: [
            { field: 'image', column: 'erection_all_image', label: 'Card image' },
            { field: 'feature_image', column: 'erection_all_features_image', label: 'Feature image' },
        ],
        body: 'erection_all_body',
        features: 'erection_all_features',
    },
    {
        value: 'computer',
        label: 'Electronic Equipment Computer All-Risk',
        images: [
            { field: 'image', column: 'computer_all_risk_image', label: 'Card image' },
            { field: 'feature_image', column: 'computer_all_risk_features_image', label: 'Feature image' },
        ],
        body: 'computer_all_risk_body',
        features: 'computer_all_risk_features',
    },
];

export default function InstituteEngineeringInsurancePage({ eng }) {
    return (
        <InsuranceProductPage
            title="Engineering Insurance details"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Engineering Insurance', 'Product details']}
            description="The cover types and their details on the Corporate Engineering Insurance page."
            action={route('institute-engineering-update')}
            record={eng}
            bodyField="insurance_body"
            variants={variants}
        />
    );
}
