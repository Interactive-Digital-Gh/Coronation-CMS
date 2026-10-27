import { Link } from '@inertiajs/react';
import { ChevronRight, ExternalLink, Eye, EyeOff, LoaderCircle } from 'lucide-react';
import { forwardRef, useState } from 'react';

export function PageHeader({ title, breadcrumbs = [], actions }) {
    return (
        <div className="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                {breadcrumbs.length > 0 && (
                    <ol className="mb-1 flex flex-wrap items-center gap-1 text-sm text-gray-500">
                        {breadcrumbs.map((crumb, index) => (
                            <li key={crumb} className="flex items-center gap-1">
                                {index > 0 && <ChevronRight className="h-3.5 w-3.5" />}
                                {crumb}
                            </li>
                        ))}
                    </ol>
                )}
                <h1 className="text-2xl font-semibold text-gray-900">{title}</h1>
            </div>
            {actions && <div className="flex gap-2">{actions}</div>}
        </div>
    );
}

export function Card({ title, description, children, className = '' }) {
    return (
        <section className={`rounded-xl bg-white shadow-sm ring-1 ring-gray-200 ${className}`}>
            {title && (
                <header className="border-b border-gray-100 px-6 py-4">
                    <h2 className="text-base font-semibold text-gray-900">{title}</h2>
                    {description && <p className="mt-1 text-sm text-gray-500">{description}</p>}
                </header>
            )}
            <div className="space-y-6 p-6">{children}</div>
        </section>
    );
}

// The old screens embedded the live website above each form; keep it one click away.
export function LivePreview({ url = 'https://coronation.com.gh/' }) {
    const [open, setOpen] = useState(false);

    return (
        <section className="mb-6 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">
            <div className="flex items-center justify-between px-6 py-3">
                <div>
                    <h2 className="text-sm font-semibold text-gray-900">Live site</h2>
                    <p className="text-sm text-gray-500">The page this section appears on.</p>
                </div>
                <div className="flex items-center gap-2">
                    <a
                        href={url}
                        target="_blank"
                        rel="noopener"
                        className="inline-flex items-center gap-1.5 rounded-md px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-100"
                    >
                        <ExternalLink className="h-4 w-4" /> Open
                    </a>
                    <SecondaryButton type="button" onClick={() => setOpen(!open)}>
                        {open ? <EyeOff className="h-4 w-4" /> : <Eye className="h-4 w-4" />}
                        {open ? 'Hide preview' : 'Show preview'}
                    </SecondaryButton>
                </div>
            </div>
            {open && <iframe src={url} title="Live site" className="h-[480px] w-full border-t border-gray-200" />}
        </section>
    );
}

export function Label({ htmlFor, children, className = '' }) {
    return (
        <label htmlFor={htmlFor} className={`block text-sm font-medium text-gray-700 ${className}`}>
            {children}
        </label>
    );
}

export function InputError({ message, className = '' }) {
    return message ? <p className={`mt-1.5 text-sm text-red-600 ${className}`}>{message}</p> : null;
}

export const TextInput = forwardRef(function TextInput({ className = '', ...props }, ref) {
    return (
        <input
            type="text"
            {...props}
            ref={ref}
            className={`block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 ${className}`}
        />
    );
});

export const TextField = forwardRef(function TextField({ label, id, error, ...props }, ref) {
    return (
        <div>
            <Label htmlFor={id}>{label}</Label>
            <TextInput id={id} ref={ref} className="mt-1.5" {...props} />
            <InputError message={error} />
        </div>
    );
});

const buttonBase =
    'inline-flex items-center justify-center gap-2 rounded-md px-4 py-2 text-sm font-medium shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60';

export function PrimaryButton({ className = '', processing = false, children, ...props }) {
    return (
        <button
            {...props}
            disabled={processing || props.disabled}
            className={`${buttonBase} bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 ${className}`}
        >
            {processing && <LoaderCircle className="h-4 w-4 animate-spin" />}
            {children}
        </button>
    );
}

export function SecondaryButton({ className = '', children, ...props }) {
    return (
        <button
            {...props}
            className={`${buttonBase} bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:ring-blue-500 ${className}`}
        >
            {children}
        </button>
    );
}

export function DangerButton({ className = '', processing = false, children, ...props }) {
    return (
        <button
            {...props}
            disabled={processing || props.disabled}
            className={`${buttonBase} bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 ${className}`}
        >
            {processing && <LoaderCircle className="h-4 w-4 animate-spin" />}
            {children}
        </button>
    );
}

export function ButtonLink({ className = '', children, ...props }) {
    return (
        <Link
            {...props}
            className={`${buttonBase} bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 ${className}`}
        >
            {children}
        </Link>
    );
}

export function FormActions({ processing, isDirty = false, label = 'Save changes' }) {
    return (
        <div className="sticky bottom-0 z-10 -mx-4 flex items-center justify-end gap-3 border-t border-gray-200 bg-gray-100/90 px-4 py-4 backdrop-blur sm:mx-0 sm:rounded-b-xl sm:px-0">
            {isDirty && !processing && <span className="text-sm text-gray-500">Unsaved changes</span>}
            <PrimaryButton type="submit" processing={processing}>
                {processing ? 'Saving…' : label}
            </PrimaryButton>
        </div>
    );
}

// Switches between the variants of a section (left/right card, insurance type…)
// through the query string, exactly as the old ?card= / ?type= links did.
export function TabNav({ param, tabs, current }) {
    return (
        <div className="border-b border-gray-200">
            <nav className="-mb-px flex flex-wrap gap-x-6">
                {tabs.map((tab) => (
                    <Link
                        key={tab.value}
                        href={`?${param}=${tab.value}`}
                        preserveScroll
                        className={`border-b-2 px-1 py-3 text-sm font-medium ${
                            tab.value === current
                                ? 'border-blue-600 text-blue-600'
                                : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                        }`}
                    >
                        {tab.label}
                    </Link>
                ))}
            </nav>
        </div>
    );
}

export function Grid({ children }) {
    return <div className="grid gap-6 lg:grid-cols-2">{children}</div>;
}
