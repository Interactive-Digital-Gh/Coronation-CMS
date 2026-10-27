import ImageTextPage from '@/Components/ImageTextPage';

export default function HomeHeader({ home_header: homeHeader }) {
    return (
        <ImageTextPage
            title="Homepage Header"
            breadcrumbs={['Individual', 'Homepage', 'Header']}
            action={route('home-header-update')}
            image={homeHeader.header_image}
            caption={homeHeader.header_caption}
            body={homeHeader.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
