import ImageTextPage from '@/Components/ImageTextPage';

export default function PnsSection2({ pns }) {
    return (
        <ImageTextPage
            title="Institute Products &amp; Solutions Section 2"
            breadcrumbs={['Institute', 'Products & Solutions', 'Section 2']}
            action={route('institute-pns-section2-update')}
            image={pns.sec2_image}
            caption={pns.sec2_caption}
            body={pns.sec2_body}
            imageTitle="Section 2 image"
            textTitle="Section 2 text"
        />
    );
}
