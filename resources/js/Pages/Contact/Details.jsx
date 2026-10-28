import { Card, FormActions, LivePreview, PageHeader, TabNav, TextField } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useQueryParam } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

const countries = [
    { value: 'gh', label: 'Ghana' },
    { value: 'ng', label: 'Nigeria' },
];

export default function ContactDetails({ contact }) {
    const country = useQueryParam('country', 'gh') === 'ng' ? countries[1] : countries[0];
    const prefix = country.value;

    const form = useCmsForm({
        submit: prefix,
        number: contact[`${prefix}_call_no`] ?? '',
        email: contact[`${prefix}_email`] ?? '',
        location: contact[`${prefix}_headoffice`] ?? '',
    });

    const field = (label, name) => (
        <TextField
            label={label}
            id={name}
            value={form.data[name]}
            onChange={(event) => form.setData(name, event.target.value)}
            error={form.errors[name]}
        />
    );

    return (
        <AuthenticatedLayout title="Office details">
            <PageHeader title="Office details" breadcrumbs={['Personal', 'Contact', 'Office details']} description="Office addresses and contact details for Ghana and Nigeria on the Contact page." />
            <LivePreview />

            <form onSubmit={form.submit(route('contact-update'))} className="space-y-6">
                <TabNav param="country" tabs={countries} current={country.value} />

                <Card title={`${country.label} contact`}>
                    {field('Phone number(s)', 'number')}
                    {field('Email', 'email')}
                    {field('Head office location', 'location')}
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
