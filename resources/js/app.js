

require('./bootstrap');

window.Vue = require('vue');



import Photos from './components/photos.vue'



const app = new Vue({
    el: '#app',
    components: {
        Photos
    }
});





