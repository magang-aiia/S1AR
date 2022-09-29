const mix = require("laravel-mix")

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

require("laravel-mix-eslint-config")

mix.js("resources/js/app.js", "public/js")
    .eslint({
        extensions: ["js", "vue"],
        options: {
            fix: true,
            cache: false,
        },
    })
    .vue({
        options: {
            compilerOptions: {
                isCustomElement: (tag) => ["box-icon"].includes(tag),
            },
        },
    })
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss"), require("autoprefixer")])
    .alias({
        "@": "resources/js",
    })
    .webpackConfig({
        output: {
            chunkFilename: "js/[name].js?id=[chunkhash]",
        },
    })
    .extract(["@inertiajs", "vue", "lodash"], "js/vendor~utils-1.js")
    .extract(["axios", "moment"], "js/vendor~utils-2.js")
    .extract(["@fullcalendar", "v-drag"], "js/vendor~utils-3.js")
    .extract()

if (mix.inProduction()) {
    mix.version()
}
