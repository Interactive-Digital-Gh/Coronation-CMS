import ImageTextPage from '@/Components/ImageTextPage';

export default function ContactHeader({ contact }) {
    return (
        <ImageTextPage
            title="Contact Page Header"
            breadcrumbs={['Individual', 'Contact', 'Header']}
            action={route('contact-header-update')}
            image={contact.header_image}
            caption={contact.header_caption}
            body={contact.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
