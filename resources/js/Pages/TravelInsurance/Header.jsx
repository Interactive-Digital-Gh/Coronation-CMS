import ImageTextPage from '@/Components/ImageTextPage';

export default function TravelInsuranceHeader({ travel }) {
    return (
        <ImageTextPage
            title="Travel Insurance Header"
            breadcrumbs={['Individual', 'Travel Insurance', 'Header']}
            action={route('travel-header-update')}
            image={travel.header_image}
            caption={travel.header_caption}
            body={travel.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
