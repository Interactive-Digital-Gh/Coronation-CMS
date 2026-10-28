import { Head, Link, usePage } from '@inertiajs/react';
import { ChevronDown, LogOut, Menu, User, UserPlus, X } from 'lucide-react';
import { useEffect, useRef, useState } from 'react';
import Sidebar from '@/Components/Sidebar';
import ToastProvider from '@/Components/Toaster';

function UserMenu() {
    const { user } = usePage().props.auth;
    const [open, setOpen] = useState(false);
    const ref = useRef(null);

    useEffect(() => {
        const close = (event) => ref.current && !ref.current.contains(event.target) && setOpen(false);
        document.addEventListener('mousedown', close);

        return () => document.removeEventListener('mousedown', close);
    }, []);

    return (
        <div ref={ref} className="relative">
            <button
                type="button"
                onClick={() => setOpen(!open)}
                className="flex items-center gap-2 rounded-full py-1 pl-1 pr-2 text-sm text-gray-700 hover:bg-gray-100"
            >
                <span className="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-sm font-semibold text-white">
                    {user.name.charAt(0).toUpperCase()}
                </span>
                <span className="hidden font-medium sm:block">{user.name}</span>
                <ChevronDown className="h-4 w-4 text-gray-400" />
            </button>

            {open && (
                <div className="absolute right-0 z-30 mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5">
                    <Link
                        href={route('profile.edit')}
                        className="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    >
                        <User className="h-4 w-4" /> Account
                    </Link>
                    <Link
                        href={route('register')}
                        className="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    >
                        <UserPlus className="h-4 w-4" /> Add admin
                    </Link>
                    <Link
                        href={route('logout')}
                        method="post"
                        as="button"
                        className="flex w-full items-center gap-2 px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"
                    >
                        <LogOut className="h-4 w-4" /> Logout
                    </Link>
                </div>
            )}
        </div>
    );
}

export default function AuthenticatedLayout({ title, children }) {
    const [sidebarOpen, setSidebarOpen] = useState(false);

    const brand = (
        <Link href={route('home-header')} className="flex h-16 shrink-0 items-center px-6">
            <img src="/assets/images/coronation-logo.png" alt="Coronation" className="h-8 rounded bg-white px-2 py-1" />
        </Link>
    );

    return (
        <ToastProvider>
            <Head title={title} />

            <div className="min-h-screen bg-gray-100">
                {/* Desktop sidebar */}
                <aside className="fixed inset-y-0 left-0 hidden w-72 flex-col overflow-y-auto bg-slate-900 lg:flex">
                    {brand}
                    <Sidebar />
                </aside>

                {/* Mobile sidebar */}
                {sidebarOpen && (
                    <div className="fixed inset-0 z-40 lg:hidden">
                        <div className="absolute inset-0 bg-black/40" onClick={() => setSidebarOpen(false)} />
                        <aside className="absolute inset-y-0 left-0 flex w-72 flex-col overflow-y-auto bg-slate-900">
                            <div className="flex items-center justify-between pr-4">
                                {brand}
                                <button
                                    type="button"
                                    onClick={() => setSidebarOpen(false)}
                                    className="text-slate-400 hover:text-white"
                                >
                                    <span className="sr-only">Close menu</span>
                                    <X className="h-5 w-5" />
                                </button>
                            </div>
                            <Sidebar />
                        </aside>
                    </div>
                )}

                <div className="lg:pl-72">
                    <header className="sticky top-0 z-20 flex h-16 items-center gap-4 border-b border-gray-200 bg-white px-4 sm:px-6 lg:px-8">
                        <button
                            type="button"
                            onClick={() => setSidebarOpen(true)}
                            className="text-gray-500 hover:text-gray-700 lg:hidden"
                        >
                            <span className="sr-only">Open menu</span>
                            <Menu className="h-6 w-6" />
                        </button>
                        <span className="text-sm font-semibold text-gray-900">Coronation CMS</span>
                        <div className="ml-auto">
                            <UserMenu />
                        </div>
                    </header>

                    <main className="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">{children}</main>

                    <footer className="mx-auto max-w-7xl px-4 pb-8 text-sm text-gray-500 sm:px-6 lg:px-8">
                        Coronation Insurance | Interactive Digital
                    </footer>
                </div>
            </div>
        </ToastProvider>
    );
}
