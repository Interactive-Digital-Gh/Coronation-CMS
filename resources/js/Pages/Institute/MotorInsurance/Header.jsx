import ImageTextPage from '@/Components/ImageTextPage';

export default function MotorInsuranceHeader({ motor }) {
    return (
        <ImageTextPage
            title="Institute Motor Insurance Header"
            breadcrumbs={['Institute', 'Motor Insurance', 'Header']}
            action={route('institute-motor-header-update')}
            image={motor.header_image}
            caption={motor.header_caption}
            body={motor.header_body}
            imageTitle="Header image"
            textTitle="Header text"
        />
    );
}
