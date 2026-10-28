import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader, TabNav } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useQueryParam } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

// An insurance product page: section 1 text (optionally with an image) shared
// by every variant, then one variant's details, switched with ?type=.
//
// Each variant lists the record columns it edits; `bodyField` and the image
// `field`s are the request names the controller reads. They differ between
// controllers, so they are configured per page rather than assumed.
export default function InsuranceProductPage({
    title,
    breadcrumbs,
    description,
    action,
    record,
    sectionImage,
    bodyField = 'body1',
    variants,
}) {
    const requested = useQueryParam('type', variants[0].value);
    const variant = variants.find((item) => item.value === requested) ?? variants[0];

    const form = useCmsForm({
        submit: variant.value,
        caption: record.sec1_caption ?? '',
        body: record.sec1_body ?? '',
        ...(sectionImage && { [sectionImage.field]: null }),
        ...Object.fromEntries(variant.images.map((image) => [image.field, null])),
        [bodyField]: record[variant.body] ?? '',
        features: record[variant.features] ?? '',
    });

    const editor = (label, field) => (
        <RichTextEditor
            label={label}
            id={field}
            value={form.data[field]}
            onChange={(value) => form.setData(field, value)}
            error={form.errors[field]}
        />
    );

    const imageInput = (image, showPreview) => (
        <ImageInput
            key={image.field}
            label={image.label}
            id={image.field}
            value={form.data[image.field]}
            onChange={(file) => form.setData(image.field, file)}
            current={record[image.column]}
            error={form.errors[image.field]}
            showPreview={showPreview}
        />
    );

    return (
        <AuthenticatedLayout title={title}>
            <PageHeader title={title} breadcrumbs={breadcrumbs} description={description} />
            <LivePreview />

            <form onSubmit={form.submit(action)} className="space-y-6">
                <Card title="Introduction">
                    {sectionImage && imageInput(sectionImage, true)}
                    <Grid>
                        {editor('Caption', 'caption')}
                        {editor('Body', 'body')}
                    </Grid>
                </Card>

                <TabNav param="type" tabs={variants} current={variant.value} />

                <Card title={variant.label}>
                    {/* A single image gets a preview; pairs show links to keep the form compact. */}
                    <Grid>{variant.images.map((image) => imageInput(image, variant.images.length === 1))}</Grid>
                    <Grid>
                        {editor('Body', bodyField)}
                        {editor('Features', 'features')}
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
