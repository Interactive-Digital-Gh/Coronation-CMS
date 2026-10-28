import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import useCmsForm from '@/lib/useCmsForm';

// Benefits screen of an insurance product. `fields` maps request names to
// record columns; `imageColumn` adds the optional benefits image.
export default function BenefitsPage({ title, breadcrumbs, description, action, record, imageColumn, intro, fields }) {
    const form = useCmsForm({
        submit: 'submit',
        ...(imageColumn && { image: null }),
        [intro.field]: record[intro.column] ?? '',
        ...Object.fromEntries(fields.map(({ field, column }) => [field, record[column] ?? ''])),
    });

    const editor = ({ field, label }) => (
        <RichTextEditor
            key={field}
            label={label}
            id={field}
            value={form.data[field]}
            onChange={(value) => form.setData(field, value)}
            error={form.errors[field]}
        />
    );

    return (
        <AuthenticatedLayout title={title}>
            <PageHeader title={title} breadcrumbs={breadcrumbs} description={description} />
            <LivePreview />

            <form onSubmit={form.submit(action)} className="space-y-6">
                {imageColumn && (
                    <Card title="Benefits image">
                        <ImageInput
                            label="Upload image"
                            id="image"
                            value={form.data.image}
                            onChange={(file) => form.setData('image', file)}
                            current={record[imageColumn]}
                            error={form.errors.image}
                        />
                    </Card>
                )}

                <Card title="Benefits">
                    {editor(intro)}
                    <Grid>{fields.map(editor)}</Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
