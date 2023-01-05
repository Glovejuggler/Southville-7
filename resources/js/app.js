require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'SV7';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async name => {
        let page = (await import(`./Pages/${name}.vue`)).default;

        if(page.layout === undefined) {
            page.layout = BreezeAuthenticatedLayout;
        }

        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ 
    delay: 250,
    color: '#e16e5f',
    includeCSS: true,
    showSpinner: true,
});
