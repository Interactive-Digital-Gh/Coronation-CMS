import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import useCmsForm from '@/lib/useCmsForm';

// Field names are crossed on purpose: AboutUsController::updateSection1 stores
// caption_right/body_right in the sec1_*_left columns and vice versa.
export default function AboutSection1({ about }) {
    const form = useCmsForm({
        caption_right: about.sec1_caption_left ?? '',
        body_right: about.sec1_body_left ?? '',
        caption_left: about.sec1_caption_right ?? '',
        body_left: about.sec1_body_right ?? '',
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

    return (
        <AuthenticatedLayout title="About Page Section 1">
            <PageHeader title="About Page Section 1" breadcrumbs={['Individual', 'About Page', 'Section 1']} />
            <LivePreview />

            <form onSubmit={form.submit(route('about-sec1-update'))} className="space-y-6">
                <Card title="Section 1 left">
                    <Grid>
                        {editor('Caption', 'caption_right')}
                        {editor('Body', 'body_right')}
                    </Grid>
                </Card>

                <Card title="Section 1 right">
                    <Grid>
                        {editor('Caption', 'caption_left')}
                        {editor('Body', 'body_left')}
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
