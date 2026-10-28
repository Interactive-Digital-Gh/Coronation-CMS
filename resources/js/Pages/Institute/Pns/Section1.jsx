import ProductCardsPage from '@/Components/ProductCardsPage';

const cards = [
    { value: 'motor', label: 'Motor Insurance', prefix: 'motor' },
    { value: 'eng', label: 'Engineering Insurance', prefix: 'eng' },
    { value: 'marine', label: 'Marine Insurance', prefix: 'marine' },
];

export default function InstitutePnsSection1({ pns }) {
    return (
        <ProductCardsPage
            title="Institute Products & Solutions Section 1"
            breadcrumbs={['Institute', 'Products & Solutions', 'Section 1']}
            action={route('institute-pns-section1-update')}
            pns={pns}
            cards={cards}
        />
    );
}
