import BlogForm from '@/Components/BlogForm';
import { Card, TextField } from '@/Components/ui';
import useCmsForm from '@/lib/useCmsForm';

export default function InsightsEdit({ blog, categories }) {
    const category = blog.category ?? '';

    const form = useCmsForm({
        submit: '',
        main_image: null,
        pdf_file: null,
        caption: blog.caption ?? '',
        excerpt: blog.excerpt ?? '',
        body: blog.body ?? '',
        category: category.charAt(0).toUpperCase() + category.slice(1),
    });

    return (
        <BlogForm
            title="Edit post"
            form={form}
            action={route('update-blog', { id: blog.id })}
            blog={blog}
            submitLabel="Save changes"
            categoryCard={
                <Card title="Category" description="Type a new category or an existing one.">
                    <TextField
                        label="Blog category"
                        id="category"
                        placeholder="E.g. Insurance"
                        list="blog-categories"
                        value={form.data.category}
                        onChange={(event) => form.setData('category', event.target.value)}
                        error={form.errors.category}
                    />
                    <datalist id="blog-categories">
                        {categories.map(({ category: name }) => (
                            <option key={name} value={name.charAt(0).toUpperCase() + name.slice(1)} />
                        ))}
                    </datalist>
                </Card>
            }
        />
    );
}
