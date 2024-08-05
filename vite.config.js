import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/scss/app.scss',
        'resources/scss/filament/dashboard/theme.scss',
        'resources/scss/filament/admin/theme.scss',
      ],
      refresh: true,
    }),
  ],
});
