
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue' 
import VueRouter from 'vue-router'
import VueQrcodeReader from 'vue-qrcode-reader'
import VueQr from 'vue-qr'
import qrcodegenerator from './components/QrGenerator.vue' // Import our Invitation component
import App from './components/App.vue'

Vue.use(VueRouter) // Integrate the Vue-Router plugin
Vue.use(VueQrcodeReader);
Vue.use(VueQr);

Vue.component('qrcodereader', require('./components/QrCodeReader.vue').default);
// Vue.component('qrcodedrop2', require('./components/QrDrop.vue').default);
Vue.component('qrcodegenerator', require('./components/QrGenerator.vue').default);

const router = new VueRouter({
    mode: 'history',
    /*
    We just add one route
     */
    routes: [
        {
            // Wildcard path
            path: '*',
            // Specify the component to be rendered for this route
            component: qrcodegenerator,
            // Inject  props based on route.query values (our query parameters!)
            props: (route) => ({
                text: route.query.text
            })
        }
    ]
});

const app = new Vue({
    router, // Add our router configuration
    el: '#app',
    render: h => h(App)
});

new Vue({
    el: '#qrcodegenerator',
});

new Vue({
    el: '#qrcodereader',
    components: qrcodereader
});
