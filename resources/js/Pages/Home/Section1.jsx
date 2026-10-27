import { ImageInput } from '@/Components/FileInput';
import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, LivePreview, PageHeader, TabNav, TextField } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useQueryParam } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

const tabs = [
    { value: 'left', label: 'Left card', prefix: 'tile1' },
    { value: 'right', label: 'Right card', prefix: 'tile2' },
];

export default function HomeSection1({ home }) {
    const card = useQueryParam('card', 'left') === 'right' ? 'right' : 'left';
    const { prefix } = tabs.find((tab) => tab.value === card);

    const form = useCmsForm({
        submit: card,
        image: null,
        caption: home[`${prefix}_caption`] ?? '',
        body: home[`${prefix}_text`] ?? '',
        text: home[`${prefix}_btn_text`] ?? '',
        link: home[`${prefix}_btn_link`] ?? '',
    });

    return (
        <AuthenticatedLayout title="Homepage Section 1">
            <PageHeader title="Homepage Section 1" breadcrumbs={['Individual', 'Homepage', 'Section 1']} />
            <LivePreview />

            <form onSubmit={form.submit(route('home-sec1-update'))} className="space-y-6">
                <TabNav param="card" tabs={tabs} current={card} />

                <Card title="Image">
                    <ImageInput
                        label="Upload image"
                        id="image"
                        value={form.data.image}
                        onChange={(file) => form.setData('image', file)}
                        current={home[`${prefix}_image`]}
                        error={form.errors.image}
                    />
                </Card>

                <Card title="Text">
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

                <Card title="Button">
                    <Grid>
                        <TextField
                            label="Button text"
                            id="text"
                            value={form.data.text}
                            onChange={(event) => form.setData('text', event.target.value)}
                            error={form.errors.text}
                        />
                        <TextField
                            label="Button link"
                            id="link"
                            value={form.data.link}
                            onChange={(event) => form.setData('link', event.target.value)}
                            error={form.errors.link}
                        />
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
