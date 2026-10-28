import ProductCardsPage from '@/Components/ProductCardsPage';

const cards = [
    { value: 'motor', label: 'Motor Insurance', prefix: 'motor' },
    { value: 'travel', label: 'Travel Insurance', prefix: 'travel' },
    { value: 'house', label: 'Home Insurance', prefix: 'house' },
];

export default function PnsSection1({ pns }) {
    return (
        <ProductCardsPage
            title="Product cards"
            breadcrumbs={['Personal', 'Products & Solutions', 'Product cards']}
            description="The introduction and the Motor, Travel and Home Insurance cards on the Individual Insurance page."
            action={route('pns-section1-update')}
            pns={pns}
            cards={cards}
        />
    );
}
