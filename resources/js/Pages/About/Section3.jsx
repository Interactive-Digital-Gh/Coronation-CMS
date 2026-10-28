import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutSection3({ about }) {
    return (
        <ImageTextPage
            title="What We Offer"
            breadcrumbs={['Personal', 'About Us', 'What We Offer']}
            description="The What We Offer section of the About Us page."
            action={route('about-sec3-update')}
            image={about.sec3_image}
            caption={about.sec3_caption}
            body={about.sec3_body}
            imageTitle="Image"
            textTitle="Text"
        />
    );
}
