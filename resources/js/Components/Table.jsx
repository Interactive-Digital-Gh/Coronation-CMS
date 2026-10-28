import { Link } from '@inertiajs/react';
import { ExternalLink } from 'lucide-react';
import { assetUrl } from '@/lib/helpers';

export function Table({ columns, children, empty, isEmpty }) {
    return (
        <div className="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">
            <div className="overflow-x-auto">
                <table className="min-w-full divide-y divide-gray-200 text-sm">
                    <thead className="bg-gray-50">
                        <tr>
                            {columns.map((column) => (
                                <th
                                    key={column}
                                    scope="col"
                                    className="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"
                                >
                                    {column}
                                </th>
                            ))}
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-100">
                        {isEmpty ? (
                            <tr>
                                <td colSpan={columns.length} className="px-4 py-12 text-center text-gray-500">
                                    {empty}
                                </td>
                            </tr>
                        ) : (
                            children
                        )}
                    </tbody>
                </table>
            </div>
        </div>
    );
}

export function Cell({ className = '', children }) {
    return <td className={`px-4 py-3 align-top text-gray-700 ${className}`}>{children}</td>;
}

export function Thumbnail({ path }) {
    const url = assetUrl(path);

    if (!url) {
        return <span className="text-gray-400">—</span>;
    }

    return (
        <a href={url} target="_blank" rel="noopener" className="block">
            <img src={url} alt="" className="h-12 w-12 rounded-md object-cover ring-1 ring-gray-200" />
        </a>
    );
}

// Row actions are GET routes in this app (e.g. .../delete), so they are plain
// Inertia visits; destructive ones ask for confirmation first.
export function RowAction({ href, confirm, danger = false, children }) {
    return (
        <Link
            href={href}
            preserveScroll
            onBefore={() => !confirm || window.confirm(confirm)}
            className={`font-medium ${danger ? 'text-red-600 hover:text-red-800' : 'text-blue-600 hover:text-blue-800'}`}
        >
            {children}
        </Link>
    );
}

export function Pagination({ paginator }) {
    if (paginator.last_page <= 1) {
        return null;
    }

    return (
        <div className="mt-4 flex flex-col items-center justify-between gap-3 sm:flex-row">
            <p className="text-sm text-gray-500">
                Showing {paginator.from}–{paginator.to} of {paginator.total}
            </p>
            <nav className="flex flex-wrap gap-1">
                {paginator.links.map((link, index) =>
                    link.url ? (
                        <Link
                            key={index}
                            href={link.url}
                            preserveScroll
                            className={`rounded-md px-3 py-1.5 text-sm ${
                                link.active ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 ring-1 ring-gray-200 hover:bg-gray-50'
                            }`}
                            dangerouslySetInnerHTML={{ __html: link.label }}
                        />
                    ) : (
                        <span
                            key={index}
                            className="rounded-md px-3 py-1.5 text-sm text-gray-400"
                            dangerouslySetInnerHTML={{ __html: link.label }}
                        />
                    ),
                )}
            </nav>
        </div>
    );
}

export function ExternalTextLink({ href, children }) {
    return (
        <a href={href} target="_blank" rel="noopener" className="inline-flex items-center gap-1 text-blue-600 hover:underline">
            {children} <ExternalLink className="h-3 w-3" />
        </a>
    );
}
