/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import Photos from './components/photos.vue'

import Routes from './routes.js'

window.Laravel = {
    baseBath: route().ziggy.baseUrl
};
const app = new Vue({
    el: '#app',
    components: {
        Photos
    }
});
