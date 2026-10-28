import { useForm } from '@inertiajs/react';
import { PrimaryButton, TextField } from '@/Components/ui';
import GuestLayout from '@/Layouts/GuestLayout';

export default function ConfirmPassword() {
    const form = useForm({ password: '' });

    const submit = (event) => {
        event.preventDefault();
        form.post(route('password.confirm'), { onFinish: () => form.reset('password') });
    };

    return (
        <GuestLayout title="Confirm password">
            <h1 className="mb-2 text-xl font-semibold text-gray-900">Confirm your password</h1>
            <p className="mb-6 text-sm text-gray-600">This is a secure area. Please confirm your password to continue.</p>

            <form onSubmit={submit} className="space-y-5">
                <TextField
                    label="Password"
                    id="password"
                    type="password"
                    autoComplete="current-password"
                    autoFocus
                    required
                    value={form.data.password}
                    onChange={(event) => form.setData('password', event.target.value)}
                    error={form.errors.password}
                />

                <PrimaryButton type="submit" processing={form.processing} className="w-full">
                    Confirm
                </PrimaryButton>
            </form>
        </GuestLayout>
    );
}
