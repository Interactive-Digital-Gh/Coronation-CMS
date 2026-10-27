import { usePage } from '@inertiajs/react';

// Session "status" message set by the password reset / verification flows.
export default function AuthStatus({ messages = {} }) {
    const { status } = usePage().props;

    if (!status) {
        return null;
    }

    return (
        <div className="mb-4 rounded-md bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {messages[status] ?? status}
        </div>
    );
}
