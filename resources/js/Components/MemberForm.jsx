import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, PageHeader, TextField } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import useCmsForm from '@/lib/useCmsForm';

// Create/edit form shared by board members (which have a job title) and
// executive members (which don't).
export default function MemberForm({ title, breadcrumbs, action, member, withTitle, bodyLabel, bodyValue }) {
    const form = useCmsForm({
        image: null,
        name: member?.name ?? '',
        ...(withTitle && { title: member?.title ?? '' }),
        body: bodyValue ?? '',
    });

    return (
        <AuthenticatedLayout title={title}>
            <PageHeader title={title} breadcrumbs={breadcrumbs} />

            <form onSubmit={form.submit(action)} className="space-y-6">
                <Card title="Photo">
                    <ImageInput
                        label={member ? 'Upload a new photo' : 'Upload photo'}
                        id="image"
                        value={form.data.image}
                        onChange={(file) => form.setData('image', file)}
                        current={member?.image}
                        error={form.errors.image}
                    />
                </Card>

                <Card title="Details">
                    <Grid>
                        <TextField
                            label="Member name"
                            id="name"
                            value={form.data.name}
                            onChange={(event) => form.setData('name', event.target.value)}
                            error={form.errors.name}
                        />
                        {withTitle && (
                            <TextField
                                label="Member title"
                                id="title"
                                value={form.data.title}
                                onChange={(event) => form.setData('title', event.target.value)}
                                error={form.errors.title}
                            />
                        )}
                    </Grid>
                    <RichTextEditor
                        label={bodyLabel}
                        id="body"
                        value={form.data.body}
                        onChange={(value) => form.setData('body', value)}
                        error={form.errors.body}
                    />
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} label={member ? 'Save changes' : 'Add member'} />
            </form>
        </AuthenticatedLayout>
    );
}
