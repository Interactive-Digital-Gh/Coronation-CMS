import { Link, useForm, usePage } from '@inertiajs/react';
import { useRef, useState } from 'react';
import { Card, DangerButton, PageHeader, PrimaryButton, SecondaryButton, TextField } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

function Saved({ show }) {
    return show ? <span className="text-sm text-emerald-600">Saved.</span> : null;
}

function ProfileInformation({ mustVerifyEmail }) {
    const { auth, status } = usePage().props;
    const form = useForm({ name: auth.user.name, email: auth.user.email });

    const submit = (event) => {
        event.preventDefault();
        form.patch(route('profile.update'), { preserveScroll: true });
    };

    return (
        <Card title="Profile information" description="Update your name and email address.">
            <form onSubmit={submit} className="max-w-xl space-y-5">
                <TextField
                    label="Name"
                    id="name"
                    required
                    autoComplete="name"
                    value={form.data.name}
                    onChange={(event) => form.setData('name', event.target.value)}
                    error={form.errors.name}
                />
                <TextField
                    label="Email"
                    id="email"
                    type="email"
                    required
                    autoComplete="username"
                    value={form.data.email}
                    onChange={(event) => form.setData('email', event.target.value)}
                    error={form.errors.email}
                />

                {mustVerifyEmail && auth.user.email_verified_at === null && (
                    <p className="text-sm text-gray-700">
                        Your email address is unverified.{' '}
                        <Link
                            href={route('verification.send')}
                            method="post"
                            as="button"
                            className="text-blue-600 underline hover:text-blue-800"
                        >
                            Re-send the verification email.
                        </Link>
                        {status === 'verification-link-sent' && (
                            <span className="mt-2 block font-medium text-emerald-600">
                                A new verification link has been sent to your email address.
                            </span>
                        )}
                    </p>
                )}

                <div className="flex items-center gap-4">
                    <PrimaryButton type="submit" processing={form.processing}>
                        Save
                    </PrimaryButton>
                    <Saved show={form.recentlySuccessful} />
                </div>
            </form>
        </Card>
    );
}

function UpdatePassword() {
    const currentPassword = useRef(null);
    const password = useRef(null);
    const form = useForm({ current_password: '', password: '', password_confirmation: '' });

    const submit = (event) => {
        event.preventDefault();
        form.put(route('password.update'), {
            preserveScroll: true,
            errorBag: 'updatePassword',
            onSuccess: () => form.reset(),
            onError: (errors) => {
                if (errors.password) {
                    form.reset('password', 'password_confirmation');
                    password.current?.focus();
                }
                if (errors.current_password) {
                    form.reset('current_password');
                    currentPassword.current?.focus();
                }
            },
        });
    };

    const field = (label, name, ref, autoComplete) => (
        <TextField
            label={label}
            id={name}
            ref={ref}
            type="password"
            autoComplete={autoComplete}
            value={form.data[name]}
            onChange={(event) => form.setData(name, event.target.value)}
            error={form.errors[name]}
        />
    );

    return (
        <Card title="Update password" description="Use a long, random password to keep your account secure.">
            <form onSubmit={submit} className="max-w-xl space-y-5">
                {field('Current password', 'current_password', currentPassword, 'current-password')}
                {field('New password', 'password', password, 'new-password')}
                {field('Confirm password', 'password_confirmation', null, 'new-password')}

                <div className="flex items-center gap-4">
                    <PrimaryButton type="submit" processing={form.processing}>
                        Save
                    </PrimaryButton>
                    <Saved show={form.recentlySuccessful} />
                </div>
            </form>
        </Card>
    );
}

function DeleteAccount() {
    const [confirming, setConfirming] = useState(false);
    const form = useForm({ password: '' });

    const close = () => {
        setConfirming(false);
        form.clearErrors();
        form.reset();
    };

    const submit = (event) => {
        event.preventDefault();
        form.delete(route('profile.destroy'), {
            preserveScroll: true,
            errorBag: 'userDeletion',
            onSuccess: close,
            onFinish: () => form.reset(),
        });
    };

    return (
        <Card
            title="Delete account"
            description="Once your account is deleted, all of its data is permanently removed."
        >
            <DangerButton type="button" onClick={() => setConfirming(true)}>
                Delete account
            </DangerButton>

            {confirming && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4">
                    <div className="absolute inset-0 bg-black/40" onClick={close} />
                    <form
                        onSubmit={submit}
                        className="relative w-full max-w-lg space-y-5 rounded-xl bg-white p-6 shadow-xl"
                    >
                        <div>
                            <h2 className="text-lg font-semibold text-gray-900">Delete your account?</h2>
                            <p className="mt-1 text-sm text-gray-600">
                                This cannot be undone. Enter your password to confirm.
                            </p>
                        </div>
                        <TextField
                            label="Password"
                            id="delete_password"
                            type="password"
                            autoFocus
                            value={form.data.password}
                            onChange={(event) => form.setData('password', event.target.value)}
                            error={form.errors.password}
                        />
                        <div className="flex justify-end gap-3">
                            <SecondaryButton type="button" onClick={close}>
                                Cancel
                            </SecondaryButton>
                            <DangerButton type="submit" processing={form.processing}>
                                Delete account
                            </DangerButton>
                        </div>
                    </form>
                </div>
            )}
        </Card>
    );
}

export default function ProfileEdit({ mustVerifyEmail }) {
    return (
        <AuthenticatedLayout title="Account">
            <PageHeader title="Account" />
            <div className="space-y-6">
                <ProfileInformation mustVerifyEmail={mustVerifyEmail} />
                <UpdatePassword />
                <DeleteAccount />
            </div>
        </AuthenticatedLayout>
    );
}
