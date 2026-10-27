import { Link, useForm } from '@inertiajs/react';
import AuthStatus from '@/Components/AuthStatus';
import { PrimaryButton } from '@/Components/ui';
import GuestLayout from '@/Layouts/GuestLayout';

export default function VerifyEmail() {
    const form = useForm({});

    const submit = (event) => {
        event.preventDefault();
        form.post(route('verification.send'));
    };

    return (
        <GuestLayout title="Verify email">
            <h1 className="mb-2 text-xl font-semibold text-gray-900">Verify your email</h1>
            <p className="mb-6 text-sm text-gray-600">
                Thanks for signing up! Please verify your email address by clicking the link we just emailed to you. If
                you didn't receive it, we can send another.
            </p>
            <AuthStatus
                messages={{
                    'verification-link-sent': 'A new verification link has been sent to your email address.',
                }}
            />

            <form onSubmit={submit} className="flex items-center justify-between">
                <PrimaryButton type="submit" processing={form.processing}>
                    Resend verification email
                </PrimaryButton>
                <Link href={route('logout')} method="post" as="button" className="text-sm text-gray-600 hover:underline">
                    Log out
                </Link>
            </form>
        </GuestLayout>
    );
}
