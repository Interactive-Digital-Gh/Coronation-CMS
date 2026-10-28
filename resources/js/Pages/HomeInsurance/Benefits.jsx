import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefits_body', column: 'benefit_body', label: 'Benefits introduction' };

const fields = [
    { field: 'benefits', column: 'home_benefits', label: 'Home insurance benefits' },
];

export default function HomeInsuranceBenefits({ home }) {
    return (
        <BenefitsPage
            title="Home Insurance Benefits"
            breadcrumbs={['Individual', 'Home Insurance', 'Benefits']}
            action={route('home-update-benefits')}
            record={home}
            imageColumn="benefit_image"
            intro={intro}
            fields={fields}
        />
    );
}
