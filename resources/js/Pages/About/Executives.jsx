import { Plus } from 'lucide-react';
import { Cell, RowAction, Table, Thumbnail } from '@/Components/Table';
import { ButtonLink, LivePreview, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { formatDateTime } from '@/lib/helpers';

export default function Executives({ executives }) {
    return (
        <AuthenticatedLayout title="Executive Members">
            <PageHeader
                title="Executive Members"
                breadcrumbs={['Individual', 'About Page', 'Executive Members']}
                actions={
                    <ButtonLink href={route('create-executive-member')}>
                        <Plus className="h-4 w-4" /> Add executive member
                    </ButtonLink>
                }
            />
            <LivePreview url="https://coronation.com.gh/purpleabout" />

            <Table
                columns={['Photo', 'Name', 'Date added', 'Date edited', '']}
                isEmpty={executives.length === 0}
                empty="No executive members yet."
            >
                {executives.map((executive) => (
                    <tr key={executive.id}>
                        <Cell>
                            <Thumbnail path={executive.image} />
                        </Cell>
                        <Cell className="font-medium text-gray-900">{executive.name}</Cell>
                        <Cell className="whitespace-nowrap">{formatDateTime(executive.created_at)}</Cell>
                        <Cell className="whitespace-nowrap">{formatDateTime(executive.updated_at)}</Cell>
                        <Cell className="whitespace-nowrap text-right">
                            <div className="flex justify-end gap-4">
                                <RowAction href={route('edit-executive-member', { id: executive.id })}>Edit</RowAction>
                                <RowAction
                                    href={route('delete-executive-member', { id: executive.id })}
                                    confirm={`Delete ${executive.name}? This cannot be undone.`}
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
