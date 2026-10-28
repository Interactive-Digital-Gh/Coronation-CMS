import ProductCardsPage from '@/Components/ProductCardsPage';

const cards = [
    { value: 'motor', label: 'Motor Insurance', prefix: 'motor' },
    { value: 'eng', label: 'Engineering Insurance', prefix: 'eng' },
    { value: 'marine', label: 'Marine Insurance', prefix: 'marine' },
];

export default function InstitutePnsSection1({ pns }) {
    return (
        <ProductCardsPage
            title="Product cards"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Product cards']}
            description="The introduction and the Motor, Engineering and Marine Insurance cards on the Corporate Insurance page."
            action={route('institute-pns-section1-update')}
            pns={pns}
            cards={cards}
        />
    );
}
