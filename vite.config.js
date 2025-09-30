import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                
                //view
                'resources/js/Admin/dashboard.js',
                'resources/js/Admin/rawat_jalan.js',
                'resources/js/Admin/registrasi.js',
            ],
            refresh: true,
        }),
    ],
});
