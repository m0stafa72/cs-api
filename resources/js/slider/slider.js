

Vue.component('slider_table', require('./components/table.vue').default);
Vue.component('new_slider', require('./components/new_slider.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#slider',
});
