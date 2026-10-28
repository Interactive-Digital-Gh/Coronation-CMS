import ImageTextPage from '@/Components/ImageTextPage';

export default function TravelInsuranceHeader({ travel }) {
    return (
        <ImageTextPage
            title="Travel Insurance banner"
            breadcrumbs={['Personal', 'Products & Solutions', 'Travel Insurance', 'Page banner']}
            description="The banner at the top of the Travel Insurance page."
            action={route('travel-header-update')}
            image={travel.header_image}
            caption={travel.header_caption}
            body={travel.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
