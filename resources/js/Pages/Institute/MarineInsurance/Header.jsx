import ImageTextPage from '@/Components/ImageTextPage';

export default function MarineInsuranceHeader({ marine }) {
    return (
        <ImageTextPage
            title="Marine Insurance banner"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Marine Insurance', 'Page banner']}
            description="The banner at the top of the Corporate Marine Insurance page."
            action={route('institute-marine-header-update')}
            image={marine.header_image}
            caption={marine.header_caption}
            body={marine.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
