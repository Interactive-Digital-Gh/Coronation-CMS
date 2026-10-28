import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutSection4({ about }) {
    return (
        <ImageTextPage
            title="Our History"
            breadcrumbs={['Personal', 'About Us', 'Our History']}
            description="The Our History section of the About Us page."
            action={route('about-sec4-update')}
            image={about.sec4_image}
            caption={about.sec4_caption}
            body={about.sec4_body}
            imageTitle="Image"
            textTitle="Text"
        />
    );
}
