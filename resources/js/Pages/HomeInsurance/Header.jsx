import ImageTextPage from '@/Components/ImageTextPage';

export default function HomeInsuranceHeader({ home }) {
    return (
        <ImageTextPage
            title="Home Insurance banner"
            breadcrumbs={['Personal', 'Products & Solutions', 'Home Insurance', 'Page banner']}
            description="The banner at the top of the Home Insurance page."
            action={route('house-header-update')}
            image={home.header_image}
            caption={home.header_caption}
            body={home.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
