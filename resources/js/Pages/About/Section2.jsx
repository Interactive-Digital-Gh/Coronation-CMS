import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutSection2({ about }) {
    return (
        <ImageTextPage
            title="What We Do"
            breadcrumbs={['Personal', 'About Us', 'What We Do']}
            description="The What We Do section of the About Us page."
            action={route('about-sec2-update')}
            image={about.sec2_image}
            caption={about.sec2_caption}
            body={about.sec2_body}
            imageTitle="Image"
            textTitle="Text"
        />
    );
}
