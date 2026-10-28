import ImageTextPage from '@/Components/ImageTextPage';

export default function PnsSection2({ pns }) {
    return (
        <ImageTextPage
            title="Products &amp; Solutions Section 2"
            breadcrumbs={['Individual', 'Products & Solutions', 'Section 2']}
            action={route('pns-section2-update')}
            image={pns.sec2_image}
            caption={pns.sec2_caption}
            body={pns.sec2_body}
            imageTitle="Section 2 image"
            textTitle="Section 2 text"
        />
    );
}
