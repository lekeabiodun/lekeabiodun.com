// @ts-check
import { defineConfig } from 'astro/config';

export default defineConfig({
    site: 'https://lekeabiodun.com',
    // Emits /about/index.html etc., matching the URLs the Laravel export produced.
    build: {
        format: 'directory',
    },
});
