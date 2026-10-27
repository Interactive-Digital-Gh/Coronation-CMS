import ImageTextPage from '@/Components/ImageTextPage';

export default function MarineInsuranceHeader({ marine }) {
    return (
        <ImageTextPage
            title="Institute Marine Insurance Header"
            breadcrumbs={['Institute', 'Marine Insurance', 'Header']}
            action={route('institute-marine-header-update')}
            image={marine.header_image}
            caption={marine.header_caption}
            body={marine.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
