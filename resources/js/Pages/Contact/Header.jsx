import ImageTextPage from '@/Components/ImageTextPage';

export default function ContactHeader({ contact }) {
    return (
        <ImageTextPage
            title="Contact banner"
            breadcrumbs={['Personal', 'Contact', 'Page banner']}
            description="The banner at the top of the Contact page."
            action={route('contact-header-update')}
            image={contact.header_image}
            caption={contact.header_caption}
            body={contact.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
