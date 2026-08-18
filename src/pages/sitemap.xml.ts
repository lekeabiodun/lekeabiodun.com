import type { APIRoute } from 'astro';
import { getPosts } from '../lib/sanity';

const SITE = 'https://lekeabiodun.com';

interface Entry {
    path: string;
    priority: string;
    lastmod: string;
}

function url({ path, priority, lastmod }: Entry): string {
    return `    <url>
        <loc>${SITE}${path}</loc>
        <lastmod>${lastmod}</lastmod>
        <changefreq>daily</changefreq>
        <priority>${priority}</priority>
    </url>`;
}

export const GET: APIRoute = async () => {
    const now = new Date().toISOString();
    const posts = await getPosts();

    const entries: Entry[] = [
        { path: '', priority: '1.0', lastmod: now },
        { path: '/about', priority: '0.8', lastmod: now },
        { path: '/work-with-me', priority: '0.9', lastmod: now },
        { path: '/uses', priority: '0.5', lastmod: now },
        { path: '/blog', priority: '0.8', lastmod: now },
        ...posts.map((post) => ({
            path: `/blog/${post.slug}`,
            priority: '0.7',
            lastmod: new Date(post._updatedAt || post.publishedAt || now).toISOString(),
        })),
    ];

    const body = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${entries.map(url).join('\n')}
</urlset>
`;

    return new Response(body, {
        headers: { 'Content-Type': 'application/xml; charset=utf-8' },
    });
};
