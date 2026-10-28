import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefits_body', column: 'benefit_body', label: 'Benefits introduction' };

const fields = [
    { field: 'benefits', column: 'home_benefits', label: 'Home insurance benefits' },
];

export default function HomeInsuranceBenefits({ home }) {
    return (
        <BenefitsPage
            title="Home Insurance benefits"
            breadcrumbs={['Personal', 'Products & Solutions', 'Home Insurance', 'Benefits']}
            description="The benefits section on the Home Insurance page."
            action={route('home-update-benefits')}
            record={home}
            imageColumn="benefit_image"
            intro={intro}
            fields={fields}
        />
    );
}
