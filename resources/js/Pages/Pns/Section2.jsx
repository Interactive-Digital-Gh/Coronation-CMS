import ImageTextPage from '@/Components/ImageTextPage';

export default function PnsSection2({ pns }) {
    return (
        <ImageTextPage
            title="Call to action"
            breadcrumbs={['Personal', 'Products & Solutions', 'Call to action']}
            description="The call-to-action section on the Individual Insurance page."
            action={route('pns-section2-update')}
            image={pns.sec2_image}
            caption={pns.sec2_caption}
            body={pns.sec2_body}
            imageTitle="Image"
            textTitle="Text"
        />
    );
}
