import RichTextEditor from '@/Components/RichTextEditor';
import { Card, FormActions, Grid, InputError, Label, LivePreview, PageHeader } from '@/Components/ui';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { stripHtml } from '@/lib/helpers';
import useCmsForm from '@/lib/useCmsForm';

const selectClass =
    'mt-1.5 block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500';

const tiles = ['insight_tile1_id', 'insight_tile2_id', 'insight_tile3_id'];

function SelectField({ label, id, value, onChange, error, children }) {
    return (
        <div>
            <Label htmlFor={id}>{label}</Label>
            <select id={id} value={value} onChange={(event) => onChange(event.target.value)} className={selectClass}>
                {children}
            </select>
            <InputError message={error} />
        </div>
    );
}

export default function HomeSection2({ home, blogs }) {
    const form = useCmsForm({
        caption: home.insight_caption ?? '',
        body: home.insight_body ?? '',
        insight_arr_type: home.insight_arr_type === 'select' ? 'select' : 'sort',
        insight_sort: home.insight_sort === 'asc' ? 'asc' : 'desc',
        // Tile columns may hold placeholder text from the original seed; only keep real blog ids.
        ...Object.fromEntries(
            tiles.map((tile) => [tile, blogs.some((blog) => String(blog.id) === String(home[tile])) ? String(home[tile]) : '']),
        ),
    });

    return (
        <AuthenticatedLayout title="Homepage Section 2">
            <PageHeader title="Homepage Section 2" breadcrumbs={['Individual', 'Homepage', 'Section 2']} />
            <LivePreview />

            <form onSubmit={form.submit(route('home-sec2-update'))} className="space-y-6">
                <Card title="Section 2 text">
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

                <Card title="Insight tiles" description="Choose which blog posts appear in the three homepage tiles.">
                    <Grid>
                        <SelectField
                            label="Tile arrangement"
                            id="insight_arr_type"
                            value={form.data.insight_arr_type}
                            onChange={(value) => form.setData('insight_arr_type', value)}
                            error={form.errors.insight_arr_type}
                        >
                            <option value="sort">Sort by date automatically</option>
                            <option value="select">Pick three posts</option>
                        </SelectField>

                        {form.data.insight_arr_type === 'sort' ? (
                            <SelectField
                                label="Order"
                                id="insight_sort"
                                value={form.data.insight_sort}
                                onChange={(value) => form.setData('insight_sort', value)}
                                error={form.errors.insight_sort}
                            >
                                <option value="desc">Newest first</option>
                                <option value="asc">Oldest first</option>
                            </SelectField>
                        ) : (
                            tiles.map((tile, index) => (
                                <SelectField
                                    key={tile}
                                    label={`Tile ${index + 1}`}
                                    id={tile}
                                    value={form.data[tile]}
                                    onChange={(value) => form.setData(tile, value)}
                                    error={form.errors[tile]}
                                >
                                    <option value="">Select a blog post</option>
                                    {blogs.map((blog) => (
                                        <option key={blog.id} value={blog.id}>
                                            {stripHtml(blog.caption)}
                                            {blog.publish ? '' : ' (unpublished)'}
                                        </option>
                                    ))}
                                </SelectField>
                            ))
                        )}
                    </Grid>
                </Card>

                <FormActions processing={form.processing} isDirty={form.isDirty} />
            </form>
        </AuthenticatedLayout>
    );
}
