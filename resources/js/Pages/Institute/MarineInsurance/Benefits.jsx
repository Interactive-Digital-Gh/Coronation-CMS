import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefits_body', column: 'benefits_body', label: 'Benefits introduction' };

const fields = [
    { field: 'benefits', column: 'marine_benefits', label: 'Marine insurance benefits' },
];

export default function InstituteMarineInsuranceBenefits({ marine }) {
    return (
        <BenefitsPage
            title="Institute Marine Insurance Benefits"
            breadcrumbs={['Institute', 'Marine Insurance', 'Benefits']}
            action={route('institute-marine-benefits-update')}
            record={marine}
            imageColumn="benefits_image"
            intro={intro}
            fields={fields}
        />
    );
}
