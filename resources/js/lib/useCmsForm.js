import { useForm } from '@inertiajs/react';

const withoutEmptyFiles = (data) => Object.fromEntries(Object.entries(data).filter(([, value]) => value !== null));

// useForm plus the submit behaviour every CMS screen shares: POST to the
// update route, keep the scroll position, and clear chosen files once saved
// (Inertia then marks the remaining values as the new clean state).
//
// File fields start as null. Unselected ones are left out of the request, as
// an empty file input would be, because some rules (e.g. the blog pdf_file)
// aren't nullable.
export default function useCmsForm(initialValues) {
    const form = useForm(initialValues);

    form.transform(withoutEmptyFiles);

    const submit = (url) => (event) => {
        event.preventDefault();

        form.post(url, {
            preserveScroll: true,
            onSuccess: () =>
                form.setData((data) =>
                    Object.fromEntries(
                        Object.entries(data).map(([key, value]) => [key, value instanceof File ? null : value]),
                    ),
                ),
        });
    };

    return { ...form, submit };
}
