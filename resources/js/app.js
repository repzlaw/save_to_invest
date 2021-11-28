require('./bootstrap');

import Vue from 'vue'
import './plugins/vuetify';
import { App, plugin } from '@inertiajs/inertia-vue'
import PortalVue from 'portal-vue'
import { InertiaProgress } from '@inertiajs/progress'
import VueMeta from 'vue-meta';
import BootstrapVue from "bootstrap-vue";
import VueSweetalert2 from 'vue-sweetalert2';
import VueChatScroll from 'vue-chat-scroll';
import VueMask from 'v-mask';
import { Form, HasError, AlertError } from 'vform';
import VueHtmlToPaper from 'vue-html-to-paper';
import VueCookies from 'vue-cookies';

import VueCountdownTimer from 'vuejs-countdown-timer';
import VueElementLoading from "vue-element-loading";

Vue.use(VueCountdownTimer);
Vue.component("VueElementLoading", VueElementLoading);

Vue.use(plugin)
Vue.use(VueMeta)
Vue.use(BootstrapVue);
Vue.use(VueSweetalert2);
Vue.use(VueChatScroll);
Vue.use(VueMask);
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.use(VueCookies);
Vue.use(require('vue-moment'));

InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: '#fbc2eb', //'#29d',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true,
});

Vue.use(VueMeta, {
    refreshOnceOnNavigation: true
})


Vue.mixin({
    methods: {
        route: window.route
    }
})

const el = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - Save to invest` : 'Save to invest'
    },
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
        },
    }),
}).$mount(el)
