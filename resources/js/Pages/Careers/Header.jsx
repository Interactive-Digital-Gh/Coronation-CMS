import ImageTextPage from '@/Components/ImageTextPage';

export default function CareersHeader({ career }) {
    return (
        <ImageTextPage
            title="Careers banner"
            breadcrumbs={['Personal', 'Careers', 'Page banner']}
            description="The banner at the top of the Careers page."
            action={route('careers-header-update')}
            image={career.header_image}
            caption={career.header_caption}
            body={career.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
