/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// import Send from './send';



window.Vue = require('vue');


// window.send = require('./send');

// Vue.use(Send);


Vue.component('EnableAndDisable',require('./models/Enable_and_disable.vue').default);
Vue.component('Delete',require('./models/Delete.vue').default);

