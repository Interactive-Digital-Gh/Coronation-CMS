import ImageTextPage from '@/Components/ImageTextPage';

export default function PnsHeader({ pns_header: pnsHeader }) {
    return (
        <ImageTextPage
            title="Products & Solutions banner"
            breadcrumbs={['Personal', 'Products & Solutions', 'Page banner']}
            description="The banner at the top of the Individual Insurance page."
            action={route('pns-header-update')}
            image={pnsHeader.header_image}
            caption={pnsHeader.header_caption}
            body={pnsHeader.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
