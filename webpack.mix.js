const mix = require('laravel-mix');
require("laravel-mix-vue3");
const tailwindcss = require('tailwindcss');

mix.vue3('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    });
