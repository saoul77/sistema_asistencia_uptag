import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        outDir: 'public/build', // 👈 genera la carpeta build dentro de public
        emptyOutDir: true,
        rollupOptions: {
            external: ['fsevents'], // 👈 evita errores en Windows
        },
    },
});
