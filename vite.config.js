import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/footer.css',
                'resources/css/catalog.css',
                'resources/css/orders.css',
                'resources/css/header.css',
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/js/app.js',
                'resources/js/sortable.js',
                'resources/js/bootstrap.js',
                'resources/js/sortableuse.js',
                'resources/js/sortablerev.js',
                'resources/js/sortablerub.js',
                'resources/js/sortableord.js',
                'resources/js/cart.js',

            ],
            refresh: true,
        }),
    ],
});
