import { ImageInput, PdfInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

// Fields shared by the create and edit blog screens. The category card
// differs between them, so each page passes its own.
export default function BlogForm({ title, form, action, blog, categoryCard, submitLabel }) {
    const editor = (label, field, variant) => (
        <RichTextEditor
            label={label}
            id={field}
            value={form.data[field]}
            onChange={(value) => form.setData(field, value)}
            error={form.errors[field]}
            variant={variant}
        />
    );

    return (
        <AuthenticatedLayout title={title}>
            <PageHeader title={title} breadcrumbs={['Individual', 'Insights', title]} />

            <form onSubmit={form.submit(action)} className="space-y-6">
                <Card title="Files">
                    <Grid>
                        <ImageInput
                            label={blog ? 'Upload a new cover image' : 'Cover image'}
                            id="main_image"
                            value={form.data.main_image}
                            onChange={(file) => form.setData('main_image', file)}
                            current={blog?.main_image}
                            error={form.errors.main_image}
                        />
                        <PdfInput
                            label={blog ? 'Upload a new article PDF' : 'Article PDF'}
                            id="pdf_file"
                            value={form.data.pdf_file}
                            onChange={(file) => form.setData('pdf_file', file)}
                            current={blog?.pdf_file}
                            error={form.errors.pdf_file}
                        />
                    </Grid>
                </Card>

                <Card title="Content">
                    <Grid>
                        {editor('Blog caption', 'caption')}
                        {editor('Blog excerpt', 'excerpt')}
                    </Grid>
                    {editor('Blog body', 'body', 'full')}
                </Card>

                {categoryCard}

                <FormActions processing={form.processing} isDirty={form.isDirty} label={submitLabel} />
            </form>
        </AuthenticatedLayout>
    );
}
