import ImageTextPage from '@/Components/ImageTextPage';

export default function CareersSection2({ career }) {
    return (
        <ImageTextPage
            title="Culture"
            breadcrumbs={['Personal', 'Careers', 'Culture']}
            description="The Culture section of the Careers page."
            action={route('careers-section2-update')}
            image={career.sec2_image}
            caption={career.sec2_caption}
            body={career.sec2_body}
            imageTitle="Image"
            textTitle="Text"
        />
    );
}
