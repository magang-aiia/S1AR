const defaultTheme = require("tailwindcss/defaultTheme")
const withAnimations = require("animated-tailwindcss")

module.exports = withAnimations({
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            screens: {
                "-2xl": { max: "1535px" },
                "-xl": { max: "1279px" },
                "-lg": { max: "1023px" },
                "-md": { max: "767px" },
                "-sm": { max: "639px" },
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],

    daisyui: {
        styled: true,
        themes: ["emerald", "forest"],
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "forest",
    },
})
