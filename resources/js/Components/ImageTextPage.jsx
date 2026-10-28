import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import useCmsForm from '@/lib/useCmsForm';

// The most common CMS screen: one image plus a caption and body
// (every page header and most single sections).
export default function ImageTextPage({
    title,
    breadcrumbs,
    description,
    action,
    image,
    caption,
    body,
    imageTitle = 'Image',
    textTitle = 'Text',
    previewUrl,
}) {
    const form = useCmsForm({ image: null, caption: caption ?? '', body: body ?? '' });

    return (
        <AuthenticatedLayout title={title}>
            <PageHeader title={title} breadcrumbs={breadcrumbs} description={description} />
            <LivePreview url={previewUrl} />

            <form onSubmit={form.submit(action)} className="space-y-6">
                <Card title={imageTitle}>
                    <ImageInput
                        label="Upload image"
                        id="image"
                        value={form.data.image}
                        onChange={(file) => form.setData('image', file)}
                        current={image}
                        error={form.errors.image}
                    />
                </Card>

                <Card title={textTitle}>
                    <Grid>
                        <RichTextEditor
                            label="Caption"
                            id="caption"
                            value={form.data.caption}
                            onChange={(value) => form.setData('caption', value)}
                            error={form.errors.caption}
                        />
                        <RichTextEditor
                            label="Body"
                            id="body"
                            value={form.data.body}
                            onChange={(value) => form.setData('body', value)}
                            error={form.errors.body}
                        />
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
