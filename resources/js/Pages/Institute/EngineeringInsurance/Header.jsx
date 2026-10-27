import ImageTextPage from '@/Components/ImageTextPage';

export default function EngineeringInsuranceHeader({ eng }) {
    return (
        <ImageTextPage
            title="Institute Engineering Insurance Header"
            breadcrumbs={['Institute', 'Engineering Insurance', 'Header']}
            action={route('institute-eng-header-update')}
            image={eng.header_image}
            caption={eng.header_caption}
            body={eng.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
