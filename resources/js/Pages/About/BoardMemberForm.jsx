import MemberForm from '@/Components/MemberForm';

export default function BoardMemberForm({ bod }) {
    return (
        <MemberForm
            title={bod ? 'Edit Board Member' : 'Add Board Member'}
            breadcrumbs={['Individual', 'About Page', 'Board of Directors']}
            action={bod ? route('about-sec5-update', { id: bod.id }) : route('about-sec5-store')}
            member={bod}
            withTitle
            bodyLabel="Body"
            bodyValue={bod?.body}
        />
    );
}
