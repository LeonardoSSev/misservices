require('./bootstrap');

window.Vue = require('vue');

Vue.component('VcHomeAdmin', require('./components/admin/Home.vue'));
Vue.component('VcUsers', require('./components/admin/Users.vue'));

const app = new Vue({
    el: '#admin-table'
});