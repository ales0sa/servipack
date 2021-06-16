const mix = require('laravel-mix');

 //mix.webpackConfig({ resolve: { symlinks: false } }) 

mix.js('resources/js/dashboard.js', 'public/js').vue()
   .sass('vendor/ales0sa/laradash/resources/js/assets/layout/layout.scss', 'public/css')
   .options({ processCssUrls: false });


   mix.sass('resources/sass/website.scss', 'public/css')
   .options({ processCssUrls: false });

mix.disableNotifications();
mix.vue({ version: 2 });