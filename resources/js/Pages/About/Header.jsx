import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutHeader({ about_header: aboutHeader }) {
    return (
        <ImageTextPage
            title="About Us banner"
            breadcrumbs={['Personal', 'About Us', 'Page banner']}
            description="The banner at the top of the About Us page."
            action={route('about-header-update')}
            image={aboutHeader.header_image}
            caption={aboutHeader.header_caption}
            body={aboutHeader.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
