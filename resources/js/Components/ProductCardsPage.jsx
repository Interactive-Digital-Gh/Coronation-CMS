import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader, TabNav } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useQueryParam } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

// Products & Solutions section 1: the intro text plus one card per product,
// switched with ?card=. `cards` maps each tab to its column prefix.
export default function ProductCardsPage({ title, breadcrumbs, description, action, pns, cards }) {
    const requested = useQueryParam('card', cards[0].value);
    const card = cards.find((item) => item.value === requested) ?? cards[0];

    const form = useCmsForm({
        submit: card.value,
        caption1: pns.sec1_caption ?? '',
        body1: pns.sec1_body ?? '',
        image: null,
        caption: pns[`${card.prefix}_caption`] ?? '',
        body: pns[`${card.prefix}_body`] ?? '',
    });

    const editor = (label, field) => (
        <RichTextEditor
            label={label}
            id={field}
            value={form.data[field]}
            onChange={(value) => form.setData(field, value)}
            error={form.errors[field]}
        />
    );

    return (
        <AuthenticatedLayout title={title}>
            <PageHeader title={title} breadcrumbs={breadcrumbs} description={description} />
            <LivePreview />

            <form onSubmit={form.submit(action)} className="space-y-6">
                <Card title="Introduction">
                    <Grid>
                        {editor('Caption', 'caption1')}
                        {editor('Body', 'body1')}
                    </Grid>
                </Card>

                <TabNav param="card" tabs={cards} current={card.value} />

                <Card title={`${card.label} card`}>
                    <ImageInput
                        label="Upload image"
                        id="image"
                        value={form.data.image}
                        onChange={(file) => form.setData('image', file)}
                        current={pns[`${card.prefix}_image`]}
                        error={form.errors.image}
                    />
                    <Grid>
                        {editor('Caption', 'caption')}
                        {editor('Body', 'body')}
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
