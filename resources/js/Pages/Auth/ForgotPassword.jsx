import { Link, useForm } from '@inertiajs/react';
import AuthStatus from '@/Components/AuthStatus';
import { PrimaryButton, TextField } from '@/Components/ui';
import GuestLayout from '@/Layouts/GuestLayout';

export default function ForgotPassword() {
    const form = useForm({ email: '' });

    const submit = (event) => {
        event.preventDefault();
        form.post(route('password.email'));
    };

    return (
        <GuestLayout title="Forgot password">
            <h1 className="mb-2 text-xl font-semibold text-gray-900">Forgot your password?</h1>
            <p className="mb-6 text-sm text-gray-600">
                Enter your email address and we will email you a link to choose a new password.
            </p>
            <AuthStatus />

            <form onSubmit={submit} className="space-y-5">
                <TextField
                    label="Email"
                    id="email"
                    type="email"
                    autoFocus
                    required
                    value={form.data.email}
                    onChange={(event) => form.setData('email', event.target.value)}
                    error={form.errors.email}
                />

                <div className="flex items-center justify-between">
                    <Link href={route('login')} className="text-sm text-blue-600 hover:underline">
                        Back to login
                    </Link>
                    <PrimaryButton type="submit" processing={form.processing}>
                        Email reset link
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
