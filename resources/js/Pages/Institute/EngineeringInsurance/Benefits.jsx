import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefit_body', column: 'benefits_body', label: 'Benefits introduction' };

const fields = [
    { field: 'comprehensive_benefits', column: 'comprehensive_benefits', label: 'Comprehensive Insurance' },
    { field: 'third_party', column: 'tp_fire_theft_benefits', label: 'Third Party Fire and Theft Insurance' },
];

export default function InstituteEngineeringInsuranceBenefits({ eng }) {
    return (
        <BenefitsPage
            title="Institute Engineering Insurance Benefits"
            breadcrumbs={['Institute', 'Engineering Insurance', 'Benefits']}
            action={route('institute-engineering-benefits-update')}
            record={eng}
            intro={intro}
            fields={fields}
        />
    );
}
