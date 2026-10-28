import { usePage } from '@inertiajs/react';
import { ExternalLink, FileText, ImageIcon, Upload, X } from 'lucide-react';
import { useEffect, useMemo } from 'react';
import { useToast } from '@/Components/Toaster';
import { InputError, Label } from '@/Components/ui';
import { assetUrl, formatMegabytes } from '@/lib/helpers';

function Dropzone({ id, accept, file, onChange, hint, icon: Icon }) {
    return (
        <div className="flex items-center gap-3">
            <label
                htmlFor={id}
                className="flex flex-1 cursor-pointer items-center gap-3 rounded-lg border border-dashed border-gray-300 px-4 py-3 text-sm hover:border-blue-400 hover:bg-blue-50/40"
            >
                <Upload className="h-5 w-5 shrink-0 text-gray-400" />
                <span className="min-w-0 flex-1">
                    <span className="block truncate font-medium text-gray-700">
                        {file ? file.name : 'Choose a file'}
                    </span>
                    <span className="block text-xs text-gray-500">{hint}</span>
                </span>
                <Icon className="h-5 w-5 shrink-0 text-gray-300" />
            </label>
            {/* Re-keyed so clearing the value also empties the native input. */}
            <input
                key={file ? 'selected' : 'empty'}
                id={id}
                type="file"
                accept={accept}
                className="sr-only"
                onChange={(event) => onChange(event.target.files[0] ?? null)}
            />
            {file && (
                <button
                    type="button"
                    onClick={() => onChange(null)}
                    className="rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600"
                >
                    <span className="sr-only">Remove selected file</span>
                    <X className="h-4 w-4" />
                </button>
            )}
        </div>
    );
}

// Image upload with the client-side size check the old footer script did, a
// preview of the newly chosen file, and the image currently on the site.
export function ImageInput({ label, id, value, onChange, current, error, showPreview = true }) {
    const { maxImageKb } = usePage().props.uploads;
    const toast = useToast();
    const preview = useMemo(() => (value ? URL.createObjectURL(value) : null), [value]);
    const currentUrl = assetUrl(current);

    useEffect(() => () => preview && URL.revokeObjectURL(preview), [preview]);

    const select = (file) => {
        if (file && file.type.startsWith('image/') && file.size > maxImageKb * 1024) {
            toast(
                'error',
                `"${file.name}" is ${(file.size / 1048576).toFixed(1)} MB. Images must be ${formatMegabytes(maxImageKb)} or smaller.`,
            );
            onChange(null);
            return;
        }

        onChange(file);
    };

    const shown = preview ?? currentUrl;

    return (
        <div>
            <Label htmlFor={id} className="mb-1.5">
                {label}
            </Label>
            <Dropzone
                id={id}
                accept="image/jpeg,image/png,image/gif,image/webp"
                file={value}
                onChange={select}
                icon={ImageIcon}
                hint={`JPG, PNG, GIF or WebP, up to ${formatMegabytes(maxImageKb)}. Leave empty to keep the current image.`}
            />
            <InputError message={error} />

            {shown && showPreview && (
                <figure className="mt-3">
                    <div className="overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-200">
                        <img src={shown} alt="" className="max-h-64 w-full object-contain" />
                    </div>
                    <figcaption className="mt-1.5 flex items-center justify-between text-xs text-gray-500">
                        <span>{preview ? 'New image (not saved yet)' : 'Current image'}</span>
                        {!preview && (
                            <a href={currentUrl} target="_blank" rel="noopener" className="inline-flex items-center gap-1 hover:text-blue-600">
                                Full image <ExternalLink className="h-3 w-3" />
                            </a>
                        )}
                    </figcaption>
                </figure>
            )}

            {currentUrl && !showPreview && (
                <a
                    href={currentUrl}
                    target="_blank"
                    rel="noopener"
                    className="mt-2 inline-flex items-center gap-1 text-sm text-blue-600 hover:underline"
                >
                    View current image <ExternalLink className="h-3.5 w-3.5" />
                </a>
            )}
        </div>
    );
}

export function PdfInput({ label, id, value, onChange, current, error }) {
    const currentUrl = assetUrl(current);

    return (
        <div>
            <Label htmlFor={id} className="mb-1.5">
                {label}
            </Label>
            <Dropzone
                id={id}
                accept="application/pdf"
                file={value}
                onChange={onChange}
                icon={FileText}
                hint="PDF, up to about 10 MB."
            />
            <InputError message={error} />
            {currentUrl && (
                <a
                    href={currentUrl}
                    target="_blank"
                    rel="noopener"
                    className="mt-2 inline-flex items-center gap-1 text-sm text-blue-600 hover:underline"
                >
                    View current PDF <ExternalLink className="h-3.5 w-3.5" />
                </a>
            )}
        </div>
    );
}
