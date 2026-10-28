import ProductCardsPage from '@/Components/ProductCardsPage';

const cards = [
    { value: 'motor', label: 'Motor Insurance', prefix: 'motor' },
    { value: 'travel', label: 'Travel Insurance', prefix: 'travel' },
    { value: 'house', label: 'House Insurance', prefix: 'house' },
];

export default function PnsSection1({ pns }) {
    return (
        <ProductCardsPage
            title="Products & Solutions Section 1"
            breadcrumbs={['Individual', 'Products & Solutions', 'Section 1']}
            action={route('pns-section1-update')}
            pns={pns}
            cards={cards}
        />
    );
}
