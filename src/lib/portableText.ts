import { toHTML, escapeHTML, type PortableTextHtmlComponents } from '@portabletext/to-html';
import type { PortableTextBlock } from './sanity';

/** Only allow schemes that are safe to drop straight into an href. */
function isSafeUrl(url: unknown): url is string {
    return typeof url === 'string' && /^(https?:|mailto:|tel:|\/)/i.test(url);
}

const components: Partial<PortableTextHtmlComponents> = {
    block: {
        // The page already renders the post title as the <h1>, so a "H1" chosen
        // in the studio becomes an <h2> to keep a single top-level heading.
        h1: ({ children }) => `<h2>${children}</h2>`,
    },
    types: {
        image: ({ value }) => {
            const url = value?.asset?.url;

            return isSafeUrl(url)
                ? `<figure><img class="w-full rounded" src="${escapeHTML(url)}" alt=""></figure>`
                : '';
        },
    },
    marks: {
        link: ({ children, value }) => {
            if (!isSafeUrl(value?.href)) {
                return children;
            }

            return `<a href="${escapeHTML(value.href)}" rel="noopener noreferrer" target="_blank">${children}</a>`;
        },
    },
};

/** Portable Text -> HTML, rendered at build time. */
export function renderPortableText(blocks: PortableTextBlock[] | null | undefined): string {
    if (!Array.isArray(blocks) || blocks.length === 0) {
        return '';
    }

    return toHTML(blocks as never, { components });
}
