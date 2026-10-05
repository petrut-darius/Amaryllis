import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faPhone, faPhoneFlip, faEnvelope, faTruckFast } from '@fortawesome/free-solid-svg-icons';
import { faWhatsapp } from '@fortawesome/free-brands-svg-icons';
import { route } from './ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

library.add(faPhone, faPhoneFlip, faEnvelope, faTruckFast, faWhatsapp);

createInertiaApp({
    title: (title) => title || appName,

    withApp(app) {
        app.config.globalProperties.route = route;
        app.component('FontAwesomeIcon', FontAwesomeIcon);
    },

    progress: {
        delay: 250,
        color: '#4B5563',
        showSpinner: true,
    },
});