import ImageTextPage from '@/Components/ImageTextPage';

export default function EngineeringInsuranceHeader({ eng }) {
    return (
        <ImageTextPage
            title="Engineering Insurance banner"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Engineering Insurance', 'Page banner']}
            description="The banner at the top of the Corporate Engineering Insurance page."
            action={route('institute-eng-header-update')}
            image={eng.header_image}
            caption={eng.header_caption}
            body={eng.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
