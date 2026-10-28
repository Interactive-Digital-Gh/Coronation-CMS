import ImageTextPage from '@/Components/ImageTextPage';

export default function PnsHeader({ pns_header: pnsHeader }) {
    return (
        <ImageTextPage
            title="Products & Solutions banner"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Page banner']}
            description="The banner at the top of the Corporate Insurance page."
            action={route('institute-pns-header-update')}
            image={pnsHeader.header_image}
            caption={pnsHeader.header_caption}
            body={pnsHeader.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
