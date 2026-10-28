import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefits_body', column: 'benefits_body', label: 'Benefits introduction' };

const fields = [
    { field: 'benefits', column: 'marine_benefits', label: 'Marine insurance benefits' },
];

export default function InstituteMarineInsuranceBenefits({ marine }) {
    return (
        <BenefitsPage
            title="Marine Insurance benefits"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Marine Insurance', 'Benefits']}
            description="The benefits section on the Corporate Marine Insurance page."
            action={route('institute-marine-benefits-update')}
            record={marine}
            imageColumn="benefits_image"
            intro={intro}
            fields={fields}
        />
    );
}
