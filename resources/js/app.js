import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { route } from './ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),

    withApp(app) {
        app.config.globalProperties.route = route;
    },

    progress: {
        delay: 250,
        color: '#4B5563',
        showSpinner: true,
    },
});