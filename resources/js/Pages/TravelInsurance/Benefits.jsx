import BenefitsPage from '@/Components/BenefitsPage';

const intro = { field: 'benefits_body', column: 'benefits_body', label: 'Benefits introduction' };

const fields = [
    { field: 'benefits', column: 'travel_benefits', label: 'Travel insurance benefits' },
];

export default function TravelInsuranceBenefits({ travel }) {
    return (
        <BenefitsPage
            title="Travel Insurance Benefits"
            breadcrumbs={['Individual', 'Travel Insurance', 'Benefits']}
            action={route('travel-update-benefits')}
            record={travel}
            imageColumn="benefits_image"
            intro={intro}
            fields={fields}
        />
    );
}
