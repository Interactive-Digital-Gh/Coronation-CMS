import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader, TabNav } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useQueryParam } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

const cards = ['1', '2', '3', '4', '5'].map((number) => ({ value: number, label: `Card ${number}` }));

export default function CareersSection3({ career }) {
    const requested = useQueryParam('card', '1');
    const card = cards.some((item) => item.value === requested) ? requested : '1';
    const prefix = `card${card}`;

    const form = useCmsForm({
        submit: prefix,
        image: null,
        caption: career[`${prefix}_caption`] ?? '',
        body: career[`${prefix}_body`] ?? '',
    });

    return (
        <AuthenticatedLayout title="Life at Coronation cards">
            <PageHeader title="Life at Coronation cards" breadcrumbs={['Personal', 'Careers', 'Life at Coronation cards']} description="The five cards on the Careers page." />
            <LivePreview />

            <form onSubmit={form.submit(route('careers-section3-update'))} className="space-y-6">
                <TabNav param="card" tabs={cards} current={card} />

                <Card title={`Card ${card}`}>
                    <ImageInput
                        label="Upload image"
                        id="image"
                        value={form.data.image}
                        onChange={(file) => form.setData('image', file)}
                        current={career[`${prefix}_image`]}
                        error={form.errors.image}
                    />
                    <Grid>
                        <RichTextEditor
                            label="Caption"
                            id="caption"
                            value={form.data.caption}
                            onChange={(value) => form.setData('caption', value)}
                            error={form.errors.caption}
                        />
                        <RichTextEditor
                            label="Body"
                            id="body"
                            value={form.data.body}
                            onChange={(value) => form.setData('body', value)}
                            error={form.errors.body}
                        />
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
