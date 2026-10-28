import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutSection2({ about }) {
    return (
        <ImageTextPage
            title="About Page Section 2"
            breadcrumbs={['Individual', 'About Page', 'Section 2']}
            action={route('about-sec2-update')}
            image={about.sec2_image}
            caption={about.sec2_caption}
            body={about.sec2_body}
            imageTitle="Section 2 image"
            textTitle="Section 2 text"
        />
    );
}
