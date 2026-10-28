import { Link, useForm } from '@inertiajs/react';
import AuthStatus from '@/Components/AuthStatus';
import { PrimaryButton, TextField } from '@/Components/ui';
import GuestLayout from '@/Layouts/GuestLayout';

export default function Login({ canResetPassword }) {
    const form = useForm({ email: '', password: '', remember: false });

    const submit = (event) => {
        event.preventDefault();
        form.post(route('login'), { onFinish: () => form.reset('password') });
    };

    return (
        <GuestLayout title="Log in">
            <h1 className="mb-6 text-xl font-semibold text-gray-900">Sign in to the CMS</h1>
            <AuthStatus />

            <form onSubmit={submit} className="space-y-5">
                <TextField
                    label="Email"
                    id="email"
                    type="email"
                    autoComplete="username"
                    autoFocus
                    required
                    value={form.data.email}
                    onChange={(event) => form.setData('email', event.target.value)}
                    error={form.errors.email}
                />
                <TextField
                    label="Password"
                    id="password"
                    type="password"
                    autoComplete="current-password"
                    required
                    value={form.data.password}
                    onChange={(event) => form.setData('password', event.target.value)}
                    error={form.errors.password}
                />

                <div className="flex items-center justify-between">
                    <label className="flex items-center gap-2 text-sm text-gray-600">
                        <input
                            type="checkbox"
                            checked={form.data.remember}
                            onChange={(event) => form.setData('remember', event.target.checked)}
                            className="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        />
                        Remember me
                    </label>
                    {canResetPassword && (
                        <Link href={route('password.request')} className="text-sm text-blue-600 hover:underline">
                            Forgot your password?
                        </Link>
                    )}
                </div>

                <PrimaryButton type="submit" processing={form.processing} className="w-full">
                    Log in
                </PrimaryButton>
            </form>
        </GuestLayout>
    );
}
