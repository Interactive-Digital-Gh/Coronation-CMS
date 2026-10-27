import ImageTextPage from '@/Components/ImageTextPage';

export default function CareersHeader({ career }) {
    return (
        <ImageTextPage
            title="Careers Page Header"
            breadcrumbs={['Individual', 'Careers', 'Header']}
            action={route('careers-header-update')}
            image={career.header_image}
            caption={career.header_caption}
            body={career.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
