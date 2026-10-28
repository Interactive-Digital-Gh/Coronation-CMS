import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import useCmsForm from '@/lib/useCmsForm';

export default function HomeSection2({ home }) {
    const form = useCmsForm({
        caption: home.insight_caption ?? '',
        body: home.insight_body ?? '',
    });

    return (
        <AuthenticatedLayout title="Insights intro">
            <PageHeader title="Insights intro" breadcrumbs={['Personal', 'Homepage', 'Insights intro']} description="The heading and text above the latest blog posts on the homepage." />
            <LivePreview />

            <form onSubmit={form.submit(route('home-sec2-update'))} className="space-y-6">
                <Card title="Text">
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
