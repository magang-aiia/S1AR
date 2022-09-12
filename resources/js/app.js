import { createApp, h } from "vue"
import { createInertiaApp } from "@inertiajs/inertia-vue3"
import { InertiaProgress } from "@inertiajs/progress"
import "boxicons/dist/boxicons"
require("./bootstrap")

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Laravel"
const route = window.route

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el)
    },
})

InertiaProgress.init({ includeCSS: true, showSpinner: true })
