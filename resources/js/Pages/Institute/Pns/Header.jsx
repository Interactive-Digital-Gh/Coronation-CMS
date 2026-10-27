import ImageTextPage from '@/Components/ImageTextPage';

export default function PnsHeader({ pns_header: pnsHeader }) {
    return (
        <ImageTextPage
            title="Institute Products &amp; Solutions Header"
            breadcrumbs={['Institute', 'Products & Solutions', 'Header']}
            action={route('institute-pns-header-update')}
            image={pnsHeader.header_image}
            caption={pnsHeader.header_caption}
            body={pnsHeader.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
