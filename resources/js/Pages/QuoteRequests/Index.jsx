import { Cell, ExternalTextLink, Pagination, Table } from '@/Components/Table';
import { PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { formatDateTime } from '@/lib/helpers';

function pageLabel(url) {
    let path;

    try {
        path = new URL(url).pathname;
    } catch {
        path = '';
    }

    const label = path || url;

    return label.length > 40 ? `${label.slice(0, 40)}...` : label;
}

export default function QuoteRequestsIndex({ requests }) {
    return (
        <AuthenticatedLayout title="Quote Requests">
            <PageHeader
                title="Quote Requests"
                breadcrumbs={['Personal', 'Quote Requests']}
                description="Quote requests sent from the website."
                actions={<span className="text-sm text-gray-500">{requests.total} total</span>}
            />

            <Table
                columns={['Date', 'Product', 'Name', 'Email', 'Phone', 'Message', 'Page']}
                isEmpty={requests.data.length === 0}
                empty="No quote requests yet."
            >
                {requests.data.map((quote) => (
                    <tr key={quote.id}>
                        <Cell className="whitespace-nowrap">{formatDateTime(quote.created_at)}</Cell>
                        <Cell>{quote.product}</Cell>
                        <Cell className="font-medium text-gray-900">
                            {quote.first_name} {quote.last_name}
                        </Cell>
                        <Cell>
                            <a href={`mailto:${quote.email}`} className="text-blue-600 hover:underline">
                                {quote.email}
                            </a>
                        </Cell>
                        <Cell className="whitespace-nowrap">
                            <a href={`tel:${quote.phone}`} className="text-blue-600 hover:underline">
                                {quote.phone}
                            </a>
                        </Cell>
                        <Cell className="min-w-64 whitespace-pre-line">{quote.message || '—'}</Cell>
                        <Cell>
                            {quote.page_url ? <ExternalTextLink href={quote.page_url}>{pageLabel(quote.page_url)}</ExternalTextLink> : '—'}
                        </Cell>
                    </tr>
                ))}
            </Table>

            <Pagination paginator={requests} />
        </AuthenticatedLayout>
    );
}
