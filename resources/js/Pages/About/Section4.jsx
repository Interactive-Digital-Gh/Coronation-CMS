import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutSection4({ about }) {
    return (
        <ImageTextPage
            title="About Page Section 4"
            breadcrumbs={['Individual', 'About Page', 'Section 4']}
            action={route('about-sec4-update')}
            image={about.sec4_image}
            caption={about.sec4_caption}
            body={about.sec4_body}
            imageTitle="Section 4 image"
            textTitle="Section 4 text"
        />
    );
}
