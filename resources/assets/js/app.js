require('./bootstrap');

window.Vue = require('vue');

Vue.component('VcHomeAdmin', require('./components/admin/Home.vue'));

const app = new Vue({
    el: '#admin-table'
});