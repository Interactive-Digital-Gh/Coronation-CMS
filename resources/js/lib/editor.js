import { Extension, Mark, Node } from '@tiptap/core';
import Image from '@tiptap/extension-image';
import { ListItem } from '@tiptap/extension-list';
import { Table, TableCell, TableHeader, TableRow } from '@tiptap/extension-table';
import StarterKit from '@tiptap/starter-kit';

// Saved copy often carries the website's own markup: Tailwind classes on
// headings, nested <div>s, a <section> layout and inline styles. A stock
// editor drops all of that, which would change the live site the first time
// a field is re-saved, so these extensions keep it.
//
// Classes are rendered inside the editor as data-cms-class so website classes
// (text-white, flex, fixed widths…) don't restyle the editing area; toHtml()
// turns them back into class="" for saving.

const BLOCK_TAGS = new Set([
    'ADDRESS', 'ARTICLE', 'ASIDE', 'BLOCKQUOTE', 'DIV', 'DL', 'FIGURE', 'FOOTER', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6',
    'HEADER', 'HR', 'OL', 'P', 'PRE', 'SECTION', 'TABLE', 'UL',
]);

const hasBlockChild = (element) => Array.from(element.children).some((child) => BLOCK_TAGS.has(child.tagName));

const classAttribute = {
    default: null,
    parseHTML: (element) => element.getAttribute('class') || null,
    renderHTML: (attributes) => (attributes.cmsClass ? { 'data-cms-class': attributes.cmsClass } : {}),
};

const styleAttribute = {
    default: null,
    parseHTML: (element) => element.getAttribute('style') || null,
    renderHTML: (attributes) => (attributes.style ? { style: attributes.style } : {}),
};

const KeepMarkup = Extension.create({
    name: 'keepMarkup',

    addGlobalAttributes() {
        return [
            {
                types: [
                    'paragraph', 'heading', 'blockquote', 'bulletList', 'orderedList', 'listItem', 'bold', 'italic',
                    'underline', 'table', 'tableRow', 'tableCell', 'tableHeader', 'image', 'hardBreak',
                ],
                attributes: { cmsClass: classAttribute, style: styleAttribute },
            },
            {
                // Text written straight into <li>/<td> is wrapped in a paragraph by the
                // editor; mark those so toHtml() can drop the <p> it never had.
                types: ['paragraph'],
                attributes: {
                    fromTag: {
                        default: false,
                        parseHTML: () => true,
                        renderHTML: (attributes) => (attributes.fromTag ? {} : { 'data-cms-bare': '' }),
                    },
                },
            },
            {
                types: ['bulletList', 'orderedList'],
                attributes: {
                    listType: {
                        default: null,
                        parseHTML: (element) => element.getAttribute('type'),
                        renderHTML: (attributes) => (attributes.listType ? { type: attributes.listType } : {}),
                    },
                },
            },
        ];
    },
});

// <div> or <section> wrapping other blocks.
const DivBlock = Node.create({
    name: 'divBlock',
    group: 'block',
    content: 'block+',
    defining: true,

    addAttributes() {
        return {
            tag: { default: 'div', parseHTML: (element) => element.tagName.toLowerCase(), renderHTML: () => ({}) },
            cmsClass: classAttribute,
            style: styleAttribute,
        };
    },

    parseHTML() {
        return [{ tag: 'section' }, { tag: 'div', getAttrs: (element) => (hasBlockChild(element) ? null : false) }];
    },

    renderHTML({ node, HTMLAttributes }) {
        return [node.attrs.tag, HTMLAttributes, 0];
    },
});

// <div> holding text directly, used like a paragraph in much of the copy.
const DivText = Node.create({
    name: 'divText',
    group: 'block',
    content: 'inline*',

    addAttributes() {
        return { cmsClass: classAttribute, style: styleAttribute };
    },

    parseHTML() {
        return [{ tag: 'div', getAttrs: (element) => (hasBlockChild(element) ? false : null) }];
    },

    renderHTML({ HTMLAttributes }) {
        return ['div', HTMLAttributes, 0];
    },
});

// Keeps styled or classed <span>s (font, colour, Word formatting).
const Span = Mark.create({
    name: 'span',
    // Spans nest in Word copy (a colour span inside a font span); let them stack.
    excludes: '',

    addAttributes() {
        return { cmsClass: classAttribute, style: styleAttribute };
    },

    parseHTML() {
        return [
            {
                tag: 'span',
                getAttrs: (element) => (element.getAttribute('class') || element.getAttribute('style') ? null : false),
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return ['span', HTMLAttributes, 0];
    },
});

export function editorExtensions(variant) {
    const extensions = [
        StarterKit.configure({
            heading: { levels: [1, 2, 3, 4, 5, 6] },
            listItem: false,
            // It appends an empty <p> after a closing list or block, which would save as a blank line.
            trailingNode: false,
            code: false,
            codeBlock: false,
            link: {
                openOnClick: false,
                autolink: true,
                defaultProtocol: 'https',
                protocols: ['mailto', 'tel'],
                HTMLAttributes: { target: null, rel: null },
            },
        }),
        // Bullets in the copy wrap <div>s, not just one paragraph.
        ListItem.extend({ content: 'block+' }),
        DivBlock,
        DivText,
        Span,
        KeepMarkup,
    ];

    if (variant === 'full') {
        extensions.push(Image, Table.configure({ resizable: false }), TableRow, TableHeader, TableCell);
    }

    return extensions;
}

/** The editor's HTML as it should be saved: real class names, no <p> the editor added inside bullets or cells, '' when empty. */
export function toHtml(editor) {
    if (editor.isEmpty) {
        return '';
    }

    const template = document.createElement('template');
    template.innerHTML = editor.getHTML();

    template.content.querySelectorAll('[data-cms-class]').forEach((element) => {
        element.setAttribute('class', element.getAttribute('data-cms-class'));
        element.removeAttribute('data-cms-class');
    });

    template.content.querySelectorAll('[data-cms-bare]').forEach((element) => {
        element.removeAttribute('data-cms-bare');

        const parent = element.parentElement;
        const alone = parent?.childNodes.length === 1 && element.attributes.length === 0;

        if (alone && ['LI', 'TD', 'TH'].includes(parent.tagName)) {
            element.replaceWith(...element.childNodes);
        }
    });

    return template.innerHTML;
}

const WRAP_FROM_STYLE = [
    [(style) => /^(bold|bolder|[6-9]00)$/.test(style.fontWeight), 'strong'],
    [(style) => style.fontStyle === 'italic', 'em'],
    [(style) => style.textDecorationLine?.includes('underline') || style.textDecoration?.includes('underline'), 'u'],
];

/**
 * Pasted content takes the website's styling: drop fonts, sizes, colours,
 * classes and Word/Google Docs markup, but keep bold/italic/underline that
 * those apps express as inline styles, and paragraph alignment.
 */
export function cleanPastedHtml(html) {
    const template = document.createElement('template');
    template.innerHTML = html
        .replace(/<!--\[if[\s\S]*?<!\[endif\]-->/gi, '')
        .replace(/<!--[\s\S]*?-->/g, '');

    template.content.querySelectorAll('style, meta, link, script, title, xml, o\\:p').forEach((element) => element.remove());

    // Google Docs wraps the whole paste in <b style="font-weight:normal">.
    template.content.querySelectorAll('b[id^="docs-internal-guid"]').forEach((element) => element.replaceWith(...element.childNodes));

    template.content.querySelectorAll('*').forEach((element) => {
        const style = element.style;

        if (element.tagName === 'SPAN' && style) {
            WRAP_FROM_STYLE.forEach(([applies, tag]) => {
                if (applies(style)) {
                    const wrapper = document.createElement(tag);
                    wrapper.append(...element.childNodes);
                    element.append(wrapper);
                }
            });
        }

        const align = BLOCK_TAGS.has(element.tagName) ? style?.textAlign : '';

        Array.from(element.attributes).forEach(({ name }) => {
            if (!['href', 'src', 'alt', 'colspan', 'rowspan', 'start'].includes(name)) {
                element.removeAttribute(name);
            }
        });

        if (align && align !== 'start' && align !== 'left') {
            element.setAttribute('style', `text-align: ${align};`);
        }
    });

    return template.innerHTML;
}

/** Sets (or clears) text-align on every text block in the selection, keeping the rest of its style. */
export function setAlignment(editor, align) {
    return editor
        .chain()
        .focus()
        .command(({ tr, state }) => {
            state.doc.nodesBetween(state.selection.from, state.selection.to, (node, pos) => {
                if (!node.isTextblock || !('style' in node.attrs)) {
                    return;
                }

                const rules = (node.attrs.style ?? '')
                    .split(';')
                    .map((rule) => rule.trim())
                    .filter((rule) => rule && !rule.toLowerCase().startsWith('text-align'));

                if (align) {
                    rules.push(`text-align: ${align}`);
                }

                tr.setNodeMarkup(pos, undefined, { ...node.attrs, style: rules.length ? `${rules.join('; ')};` : null });
            });

            return true;
        })
        .run();
}

export function currentAlignment(editor) {
    const { $from } = editor.state.selection;
    const style = $from.parent.attrs.style ?? '';

    return style.match(/text-align:\s*(left|center|right|justify)/i)?.[1]?.toLowerCase() ?? 'left';
}
