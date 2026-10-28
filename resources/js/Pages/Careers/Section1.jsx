import ImageTextPage from '@/Components/ImageTextPage';

export default function CareersSection1({ career }) {
    return (
        <ImageTextPage
            title="Careers Page Section 1"
            breadcrumbs={['Individual', 'Careers', 'Section 1']}
            action={route('careers-section1-update')}
            image={career.sec1_image}
            caption={career.sec1_caption}
            body={career.sec1_body}
            imageTitle="Section 1 image"
            textTitle="Section 1 text"
        />
    );
}
