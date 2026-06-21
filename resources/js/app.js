import '../css/app.css';

import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

function debug(payload) {
    fetch("/debug-safari", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(payload),
    }).catch(() => {});
}

debug({ step: "Dupa importuri" });

window.onerror = (message, source, line, column, error) => {
    const msg = String(message || '');
    if (
        msg.includes('dynamically imported module') ||
        msg.includes('Importing a module script failed') ||
        msg.includes('Failed to fetch dynamically imported module')
    ) {
        debug({ type: 'auto-reload-error', message: msg });
        window.location.reload();
        return;
    }
    debug({
        type: 'window.onerror',
        message,
        source,
        line,
        column,
        stack: error?.stack,
    });
};

window.onunhandledrejection = (event) => {
    const reason = String(event.reason?.message || event.reason || '');
    if (
        reason.includes('dynamically imported module') ||
        reason.includes('Importing a module script failed') ||
        reason.includes('Failed to fetch dynamically imported module') ||
        reason.includes('error loading dynamically imported module')
    ) {
        debug({ type: 'auto-reload-unhandledrejection', message: reason });
        window.location.reload();
        return;
    }
    debug({
        type: 'unhandledrejection',
        reason: String(event.reason),
        stack: event.reason?.stack,
    });
};

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

router.on('error', (event) => {
    debug({
        type: 'inertia.error',
        error: String(event.detail.error),
    })
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,

    resolve: (name) => {
        debug({ step: "In resolve", page: name });

        return resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        );
    },

    setup({ el, App, props, plugin }) {
        debug({ step: "Setup start" });

        const app = createApp({ render: () => h(App, props) });

        app.config.errorHandler = (err, instance, info) => {
            debug({
                type: 'vue.errorHandler',
                message: err?.message,
                stack: err?.stack,
                info,
            });
        };

        app.use(plugin)
            .use(ZiggyVue)
            .mount(el);

        debug({ step: "Dupa mount" });

        setTimeout(() => debug({ step: "500ms post-mount alive" }), 500);

        return app;
    },

    progress: {
        color: '#4B5563',
    },
});