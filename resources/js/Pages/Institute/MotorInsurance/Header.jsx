import ImageTextPage from '@/Components/ImageTextPage';

export default function MotorInsuranceHeader({ motor }) {
    return (
        <ImageTextPage
            title="Motor Insurance banner"
            breadcrumbs={['Corporate', 'Products & Solutions', 'Motor Insurance', 'Page banner']}
            description="The banner at the top of the Corporate Motor Insurance page."
            action={route('institute-motor-header-update')}
            image={motor.header_image}
            caption={motor.header_caption}
            body={motor.header_body}
            imageTitle="Banner image"
            textTitle="Banner text"
        />
    );
}
