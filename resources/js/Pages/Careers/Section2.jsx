import ImageTextPage from '@/Components/ImageTextPage';

export default function CareersSection2({ career }) {
    return (
        <ImageTextPage
            title="Careers Page Section 2"
            breadcrumbs={['Individual', 'Careers', 'Section 2']}
            action={route('careers-section2-update')}
            image={career.sec2_image}
            caption={career.sec2_caption}
            body={career.sec2_body}
            imageTitle="Section 2 image"
            textTitle="Section 2 text"
        />
    );
}
