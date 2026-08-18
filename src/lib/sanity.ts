import { createClient } from '@sanity/client';

/**
 * Read-only client for the public `production` dataset of the blog studio
 * (see ../../lekeabiodun-blog). Everything is fetched at build time, so the
 * deployed site is plain HTML with no runtime calls to Sanity.
 */
export const sanity = createClient({
    projectId: 'b548ys9o',
    dataset: 'production',
    apiVersion: '2023-10-01',
    useCdn: true,
});

export interface PortableTextBlock {
    _type: string;
    _key?: string;
    [key: string]: unknown;
}

export interface PostSummary {
    _id: string;
    title: string;
    slug: string;
    publishedAt: string | null;
    _createdAt: string;
    _updatedAt: string;
    excerpt: string;
}

export interface Post extends PostSummary {
    author: { name: string } | null;
    mainImage: { asset: { url: string } | null } | null;
    body: PortableTextBlock[];
}

const PUBLISHED = '_type == "post" && defined(slug.current) && defined(publishedAt) && publishedAt <= now()';

const SUMMARY_FIELDS = `
    _id,
    title,
    "slug": slug.current,
    publishedAt,
    _createdAt,
    _updatedAt,
    "excerpt": pt::text(body)
`;

/**
 * Published posts, newest first, without the body — enough to render the
 * listings on / and /blog.
 */
export async function getPosts(): Promise<PostSummary[]> {
    const posts = await sanity.fetch<PostSummary[]>(
        `*[${PUBLISHED}] | order(publishedAt desc) { ${SUMMARY_FIELDS} }`,
    );

    return posts ?? [];
}

/**
 * Published posts with their full body, used to generate one static page per
 * post. Fetched in a single request so the build makes one call, not N.
 */
export async function getPostsWithBody(): Promise<Post[]> {
    const posts = await sanity.fetch<Post[]>(
        `*[${PUBLISHED}] | order(publishedAt desc) {
            ${SUMMARY_FIELDS},
            author->{name},
            mainImage{asset->{url}},
            body[]{
                ...,
                asset->{url},
                markDefs[]{...}
            }
        }`,
    );

    return posts ?? [];
}

export function formatDate(date: string | null | undefined): string {
    if (!date) {
        return '';
    }

    return new Intl.DateTimeFormat('en', {
        month: 'short',
        day: '2-digit',
        year: 'numeric',
    }).format(new Date(date));
}

export function excerpt(value: string | null | undefined, length = 180): string {
    const text = (value || '').replace(/\s+/g, ' ').trim();

    if (text.length <= length) {
        return text;
    }

    return `${text.slice(0, length).trim()}...`;
}
