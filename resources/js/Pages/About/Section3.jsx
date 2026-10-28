import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutSection3({ about }) {
    return (
        <ImageTextPage
            title="About Page Section 3"
            breadcrumbs={['Individual', 'About Page', 'Section 3']}
            action={route('about-sec3-update')}
            image={about.sec3_image}
            caption={about.sec3_caption}
            body={about.sec3_body}
            imageTitle="Section 3 image"
            textTitle="Section 3 text"
        />
    );
}
