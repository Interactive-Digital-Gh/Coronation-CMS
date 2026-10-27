import { useForm } from '@inertiajs/react';
import { PrimaryButton, TextField } from '@/Components/ui';
import GuestLayout from '@/Layouts/GuestLayout';

export default function ResetPassword({ token, email }) {
    const form = useForm({ token, email: email ?? '', password: '', password_confirmation: '' });

    const submit = (event) => {
        event.preventDefault();
        form.post(route('password.store'), { onFinish: () => form.reset('password', 'password_confirmation') });
    };

    const field = (label, name, props) => (
        <TextField
            label={label}
            id={name}
            required
            value={form.data[name]}
            onChange={(event) => form.setData(name, event.target.value)}
            error={form.errors[name]}
            {...props}
        />
    );

    return (
        <GuestLayout title="Reset password">
            <h1 className="mb-6 text-xl font-semibold text-gray-900">Choose a new password</h1>

            <form onSubmit={submit} className="space-y-5">
                {field('Email', 'email', { type: 'email', autoComplete: 'username' })}
                {field('Password', 'password', { type: 'password', autoComplete: 'new-password', autoFocus: true })}
                {field('Confirm password', 'password_confirmation', { type: 'password', autoComplete: 'new-password' })}

                <PrimaryButton type="submit" processing={form.processing} className="w-full">
                    Reset password
                </PrimaryButton>
            </form>
        </GuestLayout>
    );
}
