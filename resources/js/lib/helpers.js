import { usePage } from '@inertiajs/react';

// Turn a stored public path (e.g. "images/uploads/home/x.jpg") into a URL,
// the same way Laravel's asset() helper did in the Blade views.
export function assetUrl(path) {
    if (!path) {
        return null;
    }

    return /^https?:\/\//.test(path) ? path : `/${path.replace(/^\/+/, '')}`;
}

// Read a query-string value from the current Inertia URL, e.g. ?card=right.
export function useQueryParam(name, fallback) {
    const { url } = usePage();
    const value = new URL(url, window.location.origin).searchParams.get(name);

    return value ?? fallback;
}

export function formatDateTime(value) {
    if (!value) {
        return '—';
    }

    return new Intl.DateTimeFormat('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
    }).format(new Date(value));
}

// Captions are stored as rich text HTML; tables only need the plain text.
export function stripHtml(html) {
    if (!html) {
        return '';
    }

    return new DOMParser().parseFromString(html, 'text/html').body.textContent.trim();
}

export function formatMegabytes(kilobytes) {
    const mb = kilobytes / 1024;

    return `${Number.isInteger(mb) ? mb : mb.toFixed(1)} MB`;
}
