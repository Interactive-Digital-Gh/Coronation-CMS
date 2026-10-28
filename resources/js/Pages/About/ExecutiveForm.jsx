import MemberForm from '@/Components/MemberForm';

export default function ExecutiveForm({ executive }) {
    return (
        <MemberForm
            title={executive ? 'Edit Executive Member' : 'Add Executive Member'}
            breadcrumbs={['Individual', 'About Page', 'Executive Members']}
            action={
                executive ? route('update-executive-member', { id: executive.id }) : route('store-executive-member')
            }
            member={executive}
            bodyLabel="Member description"
            bodyValue={executive?.description}
        />
    );
}
