import { Editor } from '@tinymce/tinymce-react';
import { InputError, Label } from '@/Components/ui';

// Same Tiny Cloud key and editor setups the Blade views loaded via
// components/head/tinymce-config.blade.php.
const apiKey = import.meta.env.VITE_TINYMCE_API_KEY || 'tyyxmenmdgznh2o3kecrdz3goo4q5541avldss8w1vlzhr3b';

const configs = {
    short: {
        height: 260,
        menubar: 'format',
        plugins: 'code table lists',
        toolbar: 'undo redo | bold italic | bullist numlist',
    },
    full: {
        height: 800,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'help',
        ],
    },
};

export default function RichTextEditor({ label, id, value, onChange, error, variant = 'short' }) {
    return (
        <div>
            <Label htmlFor={id} className="mb-1.5">
                {label}
            </Label>
            <div className={error ? 'rounded-[10px] ring-2 ring-red-500' : ''}>
                <Editor
                    id={id}
                    apiKey={apiKey}
                    value={value ?? ''}
                    onEditorChange={(content) => onChange(content)}
                    init={{ ...configs[variant], branding: false, promotion: false }}
                />
            </div>
            <InputError message={error} />
        </div>
    );
}
