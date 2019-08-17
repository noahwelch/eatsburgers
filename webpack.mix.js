const configuration = require('./config.json')

const path = require('path')
const mix = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const standardConfig = {
    resolve: {
        modules: [
            path.resolve('./node_modules'),
            path.resolve('./src/js'),
        ],
    },
}

const standardMix = () => mix
        .js('src/js/app.js', './js/app.js')
        .extract(['jquery'])
        .autoload({
            jquery: ['$', 'jQuery', 'window.jQuery'],
            'headroom.js': ['Headroom']
        })
        .sass('src/scss/style.scss', './')
        .disableNotifications()
        .options({
            processCssUrls: false
        })
        .setPublicPath('./')

if (!mix.inProduction()) {
    mix.webpackConfig(Object.assign({}, standardConfig))

    standardMix()
        .sourceMaps()
        .browserSync({
            proxy: configuration.APP_URL,
            files: [
                './js/**/*.js',
                './**/*.html',
                './**/*.php',
                './*.css'
            ]
        })
} else {
    mix.webpackConfig(standardConfig)

    standardMix().version()
}