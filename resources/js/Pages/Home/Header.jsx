import ImageTextPage from '@/Components/ImageTextPage';

export default function HomeHeader({ home_header: homeHeader }) {
    return (
        <ImageTextPage
            title="Homepage banner"
            breadcrumbs={['Personal', 'Homepage', 'Page banner']}
            description="The large banner at the top of the homepage."
            action={route('home-header-update')}
            image={homeHeader.header_image}
            caption={homeHeader.header_caption}
            body={homeHeader.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
