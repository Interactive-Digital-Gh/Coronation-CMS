import MemberForm from '@/Components/MemberForm';

export default function ExecutiveForm({ executive }) {
    return (
        <MemberForm
            title={executive ? 'Edit executive' : 'Add executive'}
            breadcrumbs={['Personal', 'About Us', 'Executive Team']}
            action={
                executive ? route('update-executive-member', { id: executive.id }) : route('store-executive-member')
            }
            member={executive}
            bodyLabel="Member description"
            bodyValue={executive?.description}
        />
    );
}
