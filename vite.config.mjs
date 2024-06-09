import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css', 'resources/sass/app.scss'],
            refresh: true,
        }),
        react(),
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        assetsDir: '',
        rollupOptions: {
            output: { 
                entryFileNames: '[name].js',
                chunkFileNames: '[name].js',
                assetFileNames: '[name].[ext]',
            },
            input: {
                main: 'resources/js/app.js',
                style: 'resources/css/app.css',
                sass: 'resources/sass/app.scss',
            },
        },
    },
});
