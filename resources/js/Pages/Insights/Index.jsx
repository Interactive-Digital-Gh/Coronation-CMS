import { Plus } from 'lucide-react';
import { Cell, RowAction, Table, Thumbnail } from '@/Components/Table';
import { ButtonLink, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { formatDateTime, stripHtml } from '@/lib/helpers';

export default function InsightsIndex({ blogs }) {
    return (
        <AuthenticatedLayout title="All posts">
            <PageHeader
                title="All posts"
                breadcrumbs={['Personal', 'Insights', 'All posts']}
                description="Blog posts for the Insights page. Only published posts appear on the website."
                actions={
                    <ButtonLink href={route('add-blog')}>
                        <Plus className="h-4 w-4" /> Add new blog
                    </ButtonLink>
                }
            />

            <Table
                columns={['Cover', 'Blog', 'Status', 'Date added', '']}
                isEmpty={blogs.length === 0}
                empty="No blogs yet."
            >
                {blogs.map((blog) => (
                    <tr key={blog.id}>
                        <Cell>
                            <Thumbnail path={blog.main_image} />
                        </Cell>
                        <Cell className="max-w-md font-medium text-gray-900">{stripHtml(blog.caption)}</Cell>
                        <Cell>
                            <span
                                className={`inline-flex rounded-full px-2 py-0.5 text-xs font-medium ${
                                    blog.publish ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-600'
                                }`}
                            >
                                {blog.publish ? 'Published' : 'Not published'}
                            </span>
                        </Cell>
                        <Cell className="whitespace-nowrap">{formatDateTime(blog.created_at)}</Cell>
                        <Cell className="whitespace-nowrap text-right">
                            <div className="flex justify-end gap-4">
                                <RowAction href={route('publish-blog', { id: blog.id })}>
                                    {blog.publish ? 'Unpublish' : 'Publish'}
                                </RowAction>
                                <RowAction href={route('edit-blog', { id: blog.id })}>Edit</RowAction>
                                <RowAction
                                    href={route('delete-blog', { id: blog.id })}
                                    confirm="Delete this blog? This cannot be undone."
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
