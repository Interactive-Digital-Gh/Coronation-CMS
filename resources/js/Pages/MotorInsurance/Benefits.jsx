import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefit_body', column: 'benefits_body', label: 'Benefits introduction' };

const fields = [
    { field: 'comprehensive_benefits', column: 'comprehensive_ins_benefits', label: 'Comprehensive' },
    { field: 'third_party', column: 'tp_fire_theft_benefits', label: 'Third Party Fire and Theft' },
];

export default function MotorInsuranceBenefits({ motor }) {
    return (
        <BenefitsPage
            title="Motor Insurance Benefits"
            breadcrumbs={['Individual', 'Motor Insurance', 'Benefits']}
            action={route('motor-update-benefits')}
            record={motor}
            intro={intro}
            fields={fields}
        />
    );
}
