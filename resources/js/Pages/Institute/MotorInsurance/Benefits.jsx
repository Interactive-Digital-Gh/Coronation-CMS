import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefit_body', column: 'benefit_body', label: 'Benefits introduction' };

const fields = [
    { field: 'comprehensive_benefits', column: 'comprehensive_benefits', label: 'Comprehensive Insurance' },
    { field: 'third_party', column: 'tp_fire_theft_benefits', label: 'Third Party Fire and Theft Insurance' },
];

export default function InstituteMotorInsuranceBenefits({ motor }) {
    return (
        <BenefitsPage
            title="Motor Insurance benefits"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Motor Insurance', 'Benefits']}
            description="The benefits section on the Corporate Motor Insurance page."
            action={route('institute-motor-benefits-update')}
            record={motor}
            intro={intro}
            fields={fields}
        />
    );
}
