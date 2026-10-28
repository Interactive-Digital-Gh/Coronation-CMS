import { Head } from '@inertiajs/react';
import ToastProvider from '@/Components/Toaster';

export default function GuestLayout({ title, children }) {
    return (
        <ToastProvider toastErrors={false}>
            <Head title={title} />

            <div className="flex min-h-screen flex-col items-center justify-center bg-gray-100 px-4 py-12">
                <img src="/assets/images/coronation-logo.png" alt="Coronation" className="mb-6 h-12" />

                <div className="w-full max-w-md rounded-xl bg-white px-6 py-8 shadow-sm ring-1 ring-gray-200 sm:px-8">
                    {children}
                </div>
            </div>
        </ToastProvider>
    );
}
