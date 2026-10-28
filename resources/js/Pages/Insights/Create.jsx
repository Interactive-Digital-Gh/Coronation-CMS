import BlogForm from '@/Components/BlogForm';
import { Card, Grid, InputError, Label, TextField } from '@/Components/ui';
import useCmsForm from '@/lib/useCmsForm';

const capitalize = (value) => value.charAt(0).toUpperCase() + value.slice(1);

export default function InsightsCreate({ categories }) {
    const options = categories.map((category) => capitalize(category.category));

    const form = useCmsForm({
        submit: '',
        main_image: null,
        pdf_file: null,
        caption: '',
        excerpt: '',
        body: '',
        new_category: '',
        existing_category: options[0] ?? '',
    });

    return (
        <BlogForm
            title="New post"
            form={form}
            action={route('submit-blog')}
            submitLabel="Create post"
            categoryCard={
                <Card title="Category" description="Type a new category, or pick an existing one. A new category takes priority.">
                    <Grid>
                        <TextField
                            label="New category"
                            id="new_category"
                            placeholder="E.g. Insurance"
                            value={form.data.new_category}
                            onChange={(event) => form.setData('new_category', event.target.value)}
                            error={form.errors.new_category}
                        />
                        <div>
                            <Label htmlFor="existing_category">Existing category</Label>
                            <select
                                id="existing_category"
                                value={form.data.existing_category}
                                onChange={(event) => form.setData('existing_category', event.target.value)}
                                disabled={form.data.new_category.trim() !== ''}
                                className="mt-1.5 block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-gray-50 disabled:text-gray-400"
                            >
                                {options.map((option) => (
                                    <option key={option}>{option}</option>
                                ))}
                            </select>
                            <InputError message={form.errors.existing_category} />
                        </div>
                    </Grid>
                </Card>
            }
        />
    );
}
