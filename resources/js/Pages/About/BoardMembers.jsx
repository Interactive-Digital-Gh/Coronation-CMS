import { Plus } from 'lucide-react';
import { Cell, RowAction, Table, Thumbnail } from '@/Components/Table';
import RichTextEditor from '@/Components/RichTextEditor';
import { ButtonLink, Card, FormActions, Grid, LivePreview, PageHeader, TextField } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { formatDateTime } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

function SectionText({ about }) {
    const form = useCmsForm({
        caption: about.bod_caption ?? '',
        body: about.bod_body ?? '',
    });

    return (
        <form onSubmit={form.submit(route('about-bod-text-update'))} className="mb-6 space-y-6">
            <Card title="Section text" description="The heading and introduction shown above the board members.">
                <Grid>
                    <TextField
                        label="Caption"
                        id="bod_caption"
                        maxLength={255}
                        value={form.data.caption}
                        onChange={(event) => form.setData('caption', event.target.value)}
                        error={form.errors.caption}
                    />
                    <RichTextEditor
                        label="Body"
                        id="bod_body"
                        value={form.data.body}
                        onChange={(value) => form.setData('body', value)}
                        error={form.errors.body}
                    />
                </Grid>
            </Card>
            <FormActions processing={form.processing} isDirty={form.isDirty} />
        </form>
    );
}

export default function BoardMembers({ bods, about }) {
    return (
        <AuthenticatedLayout title="Board of Directors">
            <PageHeader
                title="Board of Directors"
                breadcrumbs={['Personal', 'About Us', 'Board of Directors']}
                description="The board heading, introduction and member profiles on the About Us page."
                actions={
                    <ButtonLink href={route('about-create-bod')}>
                        <Plus className="h-4 w-4" /> Add board member
                    </ButtonLink>
                }
            />
            <LivePreview url="https://coronation.com.gh/purpleabout" />

            {about && <SectionText about={about} />}

            <Table
                columns={['Photo', 'Name', 'Title', 'Date added', '']}
                isEmpty={bods.length === 0}
                empty="No board members yet."
            >
                {bods.map((bod) => (
                    <tr key={bod.id}>
                        <Cell>
                            <Thumbnail path={bod.image} />
                        </Cell>
                        <Cell className="font-medium text-gray-900">{bod.name}</Cell>
                        <Cell>{bod.title}</Cell>
                        <Cell className="whitespace-nowrap">{formatDateTime(bod.created_at)}</Cell>
                        <Cell className="whitespace-nowrap text-right">
                            <div className="flex justify-end gap-4">
                                <RowAction href={route('about-sec5-edit', { id: bod.id })}>Edit</RowAction>
                                <RowAction
                                    href={route('about-sec5-delete', { id: bod.id })}
                                    confirm={`Delete ${bod.name}? This cannot be undone.`}
                                    danger
                                >
                                    Delete
                                </RowAction>
                            </div>
                        </Cell>
                    </tr>
                ))}
            </Table>
        </AuthenticatedLayout>
    );
}
