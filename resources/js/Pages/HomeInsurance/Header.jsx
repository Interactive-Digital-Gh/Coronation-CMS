import ImageTextPage from '@/Components/ImageTextPage';

export default function HomeInsuranceHeader({ home }) {
    return (
        <ImageTextPage
            title="Home Insurance Header"
            breadcrumbs={['Individual', 'Home Insurance', 'Header']}
            action={route('house-header-update')}
            image={home.header_image}
            caption={home.header_caption}
            body={home.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
