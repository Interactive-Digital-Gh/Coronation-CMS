import { useForm } from '@inertiajs/react';
import { Card, PageHeader, PrimaryButton, TextField } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Register() {
    const form = useForm({ name: '', email: '', password: '', password_confirmation: '' });

    const submit = (event) => {
        event.preventDefault();
        form.post(route('register'), {
            onSuccess: () => form.reset(),
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

    const field = (label, name, props = {}) => (
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
        <AuthenticatedLayout title="Add admin">
            <PageHeader title="Add admin" />

            <Card title="New admin account" description="The new admin can sign in straight away with this email and password.">
                <form onSubmit={submit} className="max-w-xl space-y-5">
                    {field('Name', 'name', { autoComplete: 'off', autoFocus: true })}
                    {field('Email', 'email', { type: 'email', autoComplete: 'off' })}
                    {field('Password', 'password', { type: 'password', autoComplete: 'new-password' })}
                    {field('Confirm password', 'password_confirmation', { type: 'password', autoComplete: 'new-password' })}

                    <PrimaryButton type="submit" processing={form.processing}>
                        Create admin
                    </PrimaryButton>
                </form>
            </Card>
        </AuthenticatedLayout>
    );
}
