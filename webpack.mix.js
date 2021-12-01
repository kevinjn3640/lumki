const mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .ts('resources/js/app.tsx', 'public/js')
    // .reactCSSModules('[path]__[name]___[hash:base64]')
    // .extract()
    .react()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config'))
// .browserSync({
//     proxy: process.env.APP_URL,
//     open: false,
//     port: 3000,
// });

if (mix.inProduction()) {
    mix.version();
}
