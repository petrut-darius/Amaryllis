import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
                compilerOptions: {
                    isCustomElement: (tag) => tag.startsWith('gmp-')
                }
            },
        }),
    ],
    define: {
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false,
    },
    esbuild: {
        pure: ['console.log'],
    },
    build: {
        target: ['es2020', 'safari14'],
        cssMinify: 'lightningcss',
    },
});
