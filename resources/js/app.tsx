require('./bootstrap');

import React from 'react';
import {render} from 'react-dom';
import {createInertiaApp} from '@inertiajs/inertia-react';
import {InertiaProgress} from '@inertiajs/progress';

const appName =
    window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: title => `${title} - ${appName}`,
    resolve: name => {
        const page = require(`./Pages/${name}`);
        // if (page.layout === undefined && !name.startsWith('Public/')) {
        //   page.layout ??= Layout;
        // }
        return page;
    },
    setup({el, App, props}) {
        return render(<App {...props} />, el);
    },
});

InertiaProgress.init({color: '#4B5563'});
