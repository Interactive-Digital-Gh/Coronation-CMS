import { EditorContent, useEditor, useEditorState } from '@tiptap/react';
import {
    AlignCenter,
    AlignJustify,
    AlignLeft,
    AlignRight,
    Bold,
    Check,
    CodeXml,
    Columns3,
    Image,
    Italic,
    Link,
    List,
    ListOrdered,
    Minus,
    Quote,
    Redo2,
    RemoveFormatting,
    Rows3,
    Strikethrough,
    Table,
    Trash2,
    Underline,
    Undo2,
    Unlink,
    X,
} from 'lucide-react';
import { useEffect, useRef, useState } from 'react';
import { InputError, Label } from '@/Components/ui';
import { cleanPastedHtml, currentAlignment, editorExtensions, setAlignment, toHtml } from '@/lib/editor';

const blockTypes = [
    { value: 'paragraph', label: 'Paragraph' },
    { value: 'h1', label: 'Heading 1' },
    { value: 'h2', label: 'Heading 2' },
    { value: 'h3', label: 'Heading 3' },
    { value: 'h4', label: 'Heading 4' },
    { value: 'blockquote', label: 'Quote' },
];

const alignments = [
    { value: 'left', label: 'Align left', icon: AlignLeft },
    { value: 'center', label: 'Align centre', icon: AlignCenter },
    { value: 'right', label: 'Align right', icon: AlignRight },
    { value: 'justify', label: 'Justify', icon: AlignJustify },
];

function currentBlockType(editor) {
    for (const level of [1, 2, 3, 4]) {
        if (editor.isActive('heading', { level })) {
            return `h${level}`;
        }
    }

    return editor.isActive('blockquote') ? 'blockquote' : 'paragraph';
}

function setBlockType(editor, type) {
    const chain = editor.chain().focus();

    if (editor.isActive('blockquote') && type !== 'blockquote') {
        chain.lift('blockquote');
    }

    if (type === 'blockquote') {
        return chain.setParagraph().toggleBlockquote().run();
    }

    return type === 'paragraph' ? chain.setParagraph().run() : chain.setHeading({ level: Number(type[1]) }).run();
}

function ToolButton({ label, icon: Icon, active = false, disabled = false, onClick }) {
    return (
        <button
            type="button"
            title={label}
            aria-label={label}
            aria-pressed={active}
            disabled={disabled}
            // Keep the text selection while clicking the toolbar.
            onMouseDown={(event) => event.preventDefault()}
            onClick={onClick}
            className={`rounded p-1.5 transition disabled:cursor-not-allowed disabled:opacity-40 ${
                active ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'
            }`}
        >
            <Icon className="h-4 w-4" />
        </button>
    );
}

const Divider = () => <span className="mx-1 h-5 w-px bg-gray-200" />;

function UrlBar({ placeholder, initial = '', onSubmit, onCancel, onRemove }) {
    const [url, setUrl] = useState(initial);

    const submit = () => (url.trim() ? onSubmit(url.trim()) : onCancel());

    return (
        <div className="flex items-center gap-2 border-b border-gray-200 bg-gray-50 px-2 py-1.5">
            <input
                type="url"
                autoFocus
                value={url}
                placeholder={placeholder}
                onChange={(event) => setUrl(event.target.value)}
                onKeyDown={(event) => {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        submit();
                    }
                    if (event.key === 'Escape') {
                        onCancel();
                    }
                }}
                className="block w-full rounded-md border-gray-300 py-1 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
            <ToolButton label="Apply" icon={Check} onClick={submit} />
            {onRemove && <ToolButton label="Remove link" icon={Unlink} onClick={onRemove} />}
            <ToolButton label="Cancel" icon={X} onClick={onCancel} />
        </div>
    );
}

function Toolbar({ editor, variant, sourceMode, onToggleSource }) {
    const [urlBar, setUrlBar] = useState(null);

    const state = useEditorState({
        editor,
        selector: ({ editor: current }) => ({
            blockType: currentBlockType(current),
            bold: current.isActive('bold'),
            italic: current.isActive('italic'),
            underline: current.isActive('underline'),
            strike: current.isActive('strike'),
            bulletList: current.isActive('bulletList'),
            orderedList: current.isActive('orderedList'),
            link: current.isActive('link'),
            linkHref: current.getAttributes('link').href ?? '',
            inTable: current.isActive('table'),
            align: currentAlignment(current),
            canUndo: current.can().undo(),
            canRedo: current.can().redo(),
        }),
    });

    const chain = () => editor.chain().focus();
    const off = sourceMode;

    const applyLink = (href) => {
        chain().extendMarkRange('link').setLink({ href }).run();
        setUrlBar(null);
    };

    return (
        <div className="sticky top-0 z-10 rounded-t-[9px] bg-white">
            <div className="flex flex-wrap items-center gap-0.5 border-b border-gray-200 px-2 py-1.5">
                <select
                    aria-label="Text style"
                    value={state.blockType}
                    disabled={off}
                    onChange={(event) => setBlockType(editor, event.target.value)}
                    className="mr-1 rounded-md border-gray-300 py-1 pl-2 pr-8 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-40"
                >
                    {blockTypes.map((type) => (
                        <option key={type.value} value={type.value}>
                            {type.label}
                        </option>
                    ))}
                </select>

                <ToolButton label="Bold" icon={Bold} active={state.bold} disabled={off} onClick={() => chain().toggleBold().run()} />
                <ToolButton label="Italic" icon={Italic} active={state.italic} disabled={off} onClick={() => chain().toggleItalic().run()} />
                <ToolButton label="Underline" icon={Underline} active={state.underline} disabled={off} onClick={() => chain().toggleUnderline().run()} />
                {variant === 'full' && (
                    <ToolButton label="Strikethrough" icon={Strikethrough} active={state.strike} disabled={off} onClick={() => chain().toggleStrike().run()} />
                )}
                <Divider />
                <ToolButton label="Bulleted list" icon={List} active={state.bulletList} disabled={off} onClick={() => chain().toggleBulletList().run()} />
                <ToolButton label="Numbered list" icon={ListOrdered} active={state.orderedList} disabled={off} onClick={() => chain().toggleOrderedList().run()} />
                <Divider />
                {alignments.filter(({ value }) => variant === 'full' || value !== 'justify').map(({ value, label, icon }) => (
                    <ToolButton
                        key={value}
                        label={label}
                        icon={icon}
                        active={state.align === value}
                        disabled={off}
                        onClick={() => setAlignment(editor, value === 'left' ? null : value)}
                    />
                ))}
                <Divider />
                <ToolButton
                    label="Link"
                    icon={Link}
                    active={state.link}
                    disabled={off}
                    onClick={() => setUrlBar(urlBar === 'link' ? null : 'link')}
                />
                {variant === 'full' && (
                    <>
                        <ToolButton label="Image" icon={Image} disabled={off} onClick={() => setUrlBar(urlBar === 'image' ? null : 'image')} />
                        <ToolButton label="Horizontal line" icon={Minus} disabled={off} onClick={() => chain().setHorizontalRule().run()} />
                        <ToolButton label="Quote" icon={Quote} active={state.blockType === 'blockquote'} disabled={off} onClick={() => chain().toggleBlockquote().run()} />
                        <ToolButton
                            label="Insert table"
                            icon={Table}
                            disabled={off || state.inTable}
                            onClick={() => chain().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run()}
                        />
                        {state.inTable && (
                            <>
                                <ToolButton label="Add row" icon={Rows3} disabled={off} onClick={() => chain().addRowAfter().run()} />
                                <ToolButton label="Add column" icon={Columns3} disabled={off} onClick={() => chain().addColumnAfter().run()} />
                                <ToolButton label="Delete table" icon={Trash2} disabled={off} onClick={() => chain().deleteTable().run()} />
                            </>
                        )}
                    </>
                )}
                <ToolButton
                    label="Clear formatting"
                    icon={RemoveFormatting}
                    disabled={off}
                    onClick={() => chain().unsetAllMarks().run()}
                />
                <Divider />
                <ToolButton label="Undo" icon={Undo2} disabled={off || !state.canUndo} onClick={() => chain().undo().run()} />
                <ToolButton label="Redo" icon={Redo2} disabled={off || !state.canRedo} onClick={() => chain().redo().run()} />
                <span className="flex-1" />
                <ToolButton label={sourceMode ? 'Back to editor' : 'Edit HTML'} icon={CodeXml} active={sourceMode} onClick={onToggleSource} />
            </div>

            {urlBar === 'link' && (
                <UrlBar
                    key={`link-${state.linkHref}`}
                    placeholder="https://… or mailto:…"
                    initial={state.linkHref}
                    onSubmit={applyLink}
                    onCancel={() => setUrlBar(null)}
                    onRemove={
                        state.link
                            ? () => {
                                  chain().extendMarkRange('link').unsetLink().run();
                                  setUrlBar(null);
                              }
                            : null
                    }
                />
            )}
            {urlBar === 'image' && (
                <UrlBar
                    placeholder="Image address, e.g. https://…/photo.jpg"
                    onSubmit={(src) => {
                        chain().setImage({ src }).run();
                        setUrlBar(null);
                    }}
                    onCancel={() => setUrlBar(null)}
                />
            )}
        </div>
    );
}

export default function RichTextEditor({ label, id, value, onChange, error, variant = 'short' }) {
    const [sourceMode, setSourceMode] = useState(false);
    // The last HTML this component reported, so outside value changes can be told apart from our own.
    const emitted = useRef(value ?? '');
    const onChangeRef = useRef(onChange);
    onChangeRef.current = onChange;

    const emit = (html) => {
        emitted.current = html;
        onChangeRef.current(html);
    };

    const editor = useEditor({
        extensions: editorExtensions(variant),
        content: value ?? '',
        editorProps: {
            attributes: {
                id,
                'aria-label': label,
                class: `cms-editor-content ${variant === 'full' ? 'min-h-[32rem]' : 'min-h-[10rem]'}`,
            },
            transformPastedHTML: cleanPastedHtml,
        },
        onUpdate: ({ editor: current }) => emit(toHtml(current)),
    });

    // Load new content when the form is reset or replaced from outside. Untouched
    // fields are never re-serialised, so they save exactly as they were.
    useEffect(() => {
        if (editor && (value ?? '') !== emitted.current) {
            emitted.current = value ?? '';
            editor.commands.setContent(value ?? '', { emitUpdate: false });
        }
    }, [editor, value]);

    const toggleSource = () => {
        if (sourceMode) {
            editor.commands.setContent(emitted.current, { emitUpdate: false });
        }
        setSourceMode(!sourceMode);
    };

    return (
        <div>
            <Label htmlFor={id} className="mb-1.5">
                {label}
            </Label>
            <div
                className={`cms-editor rounded-[10px] border bg-white shadow-sm focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 ${
                    error ? 'border-red-500 ring-1 ring-red-500' : 'border-gray-300'
                }`}
            >
                {editor && <Toolbar editor={editor} variant={variant} sourceMode={sourceMode} onToggleSource={toggleSource} />}

                {sourceMode ? (
                    <textarea
                        aria-label={`${label} HTML`}
                        value={value ?? ''}
                        onChange={(event) => emit(event.target.value)}
                        spellCheck={false}
                        className={`block w-full resize-y rounded-b-[9px] border-0 bg-gray-50 font-mono text-xs leading-5 text-gray-800 focus:ring-0 ${
                            variant === 'full' ? 'min-h-[32rem]' : 'min-h-[10rem]'
                        }`}
                    />
                ) : (
                    <EditorContent editor={editor} />
                )}
            </div>
            <InputError message={error} />
        </div>
    );
}
