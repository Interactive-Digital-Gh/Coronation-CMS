import { Cell, Pagination, Table } from '@/Components/Table';
import { PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { formatDateTime } from '@/lib/helpers';

const columns = ['Date', 'Name', 'Email', 'Phone', 'Request', 'Enquiry', 'Company', 'Message', 'Preferred date/time'];

export default function ContactMessagesIndex({ messages }) {
    return (
        <AuthenticatedLayout title="Contact Messages">
            <PageHeader
                title="Contact Messages"
                breadcrumbs={['Personal', 'Contact Messages']}
                description="Messages sent from the contact form on the website."
                actions={<span className="text-sm text-gray-500">{messages.total} total</span>}
            />

            <Table columns={columns} isEmpty={messages.data.length === 0} empty="No contact messages yet.">
                {messages.data.map((item) => (
                    <tr key={item.id}>
                        <Cell className="whitespace-nowrap">{formatDateTime(item.created_at)}</Cell>
                        <Cell className="font-medium text-gray-900">
                            {item.first_name} {item.last_name}
                        </Cell>
                        <Cell>
                            <a href={`mailto:${item.email}`} className="text-blue-600 hover:underline">
                                {item.email}
                            </a>
                        </Cell>
                        <Cell className="whitespace-nowrap">
                            <a href={`tel:${item.phone_number}`} className="text-blue-600 hover:underline">
                                {item.phone_number}
                            </a>
                        </Cell>
                        <Cell>{item.request_related || '—'}</Cell>
                        <Cell>{item.enquiry_related || '—'}</Cell>
                        <Cell>{item.company_related || '—'}</Cell>
                        <Cell className="min-w-64 whitespace-pre-line">{item.message}</Cell>
                        <Cell>{item.preferred_date_time || '—'}</Cell>
                    </tr>
                ))}
            </Table>

            <Pagination paginator={messages} />
        </AuthenticatedLayout>
    );
}
