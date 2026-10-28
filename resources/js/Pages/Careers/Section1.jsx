import ImageTextPage from '@/Components/ImageTextPage';

export default function CareersSection1({ career }) {
    return (
        <ImageTextPage
            title="Investing in You"
            breadcrumbs={['Personal', 'Careers', 'Investing in You']}
            description="The Investing in You (Academies) section of the Careers page."
            action={route('careers-section1-update')}
            image={career.sec1_image}
            caption={career.sec1_caption}
            body={career.sec1_body}
            imageTitle="Image"
            textTitle="Text"
        />
    );
}
