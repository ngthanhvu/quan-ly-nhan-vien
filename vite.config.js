import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: true,          // cho phép truy cập từ bên ngoài container
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost', // đổi nếu chạy LAN, ví dụ: '192.168.1.5'
        },
    },
});
