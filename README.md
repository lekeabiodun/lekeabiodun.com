# lekeabiodun.com

Personal site and blog, built with [Astro](https://astro.build) and
[Tailwind CSS](https://tailwindcss.com), deployed as static files to Cloudflare
Pages.

Blog content lives in Sanity (project `b548ys9o`, `production` dataset) and is
fetched **at build time**, so every post is shipped as plain HTML with no
runtime API calls. Publishing a new post therefore needs a rebuild — pushing to
`main` (or re-running the deploy workflow) is enough.

The Sanity Studio for that dataset lives in [`lekeabiodun-blog/`](lekeabiodun-blog),
which is a separate project with its own dependencies.

## Commands

| Command           | Does                                                    |
| :---------------- | :------------------------------------------------------ |
| `npm install`     | Install dependencies                                     |
| `npm run dev`     | Dev server at `localhost:4321`                           |
| `npm run build`   | Type-check and build the static site into `dist/`        |
| `npm run preview` | Serve the built `dist/` locally                          |
| `npm run deploy`  | Build and push `dist/` to Cloudflare Pages via Wrangler  |

## Structure

```
public/            Static assets copied verbatim (images, favicon, robots.txt)
src/components/    Header, footer, nav, SEO tags, post list
src/layouts/       The single page shell
src/lib/           Sanity client + queries, Portable Text -> HTML
src/pages/         One file per route; blog/[slug].astro renders every post
src/pages/sitemap.xml.ts   Generates /sitemap.xml at build time
```

## Deploying

Pushes to `main` run [`.github/workflows/deploy.yml`](.github/workflows/deploy.yml),
which builds the site and deploys `dist/` to the `lekeabiodun-com` Pages project.
It needs the `CLOUDFLARE_API_TOKEN` and `CLOUDFLARE_ACCOUNT_ID` repository
secrets.

To deploy from your machine instead, run `npm run deploy` with Wrangler
authenticated.
