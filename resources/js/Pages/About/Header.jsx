import ImageTextPage from '@/Components/ImageTextPage';

export default function AboutHeader({ about_header: aboutHeader }) {
    return (
        <ImageTextPage
            title="About Page Header"
            breadcrumbs={['Individual', 'About Page', 'Header']}
            action={route('about-header-update')}
            image={aboutHeader.header_image}
            caption={aboutHeader.header_caption}
            body={aboutHeader.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
