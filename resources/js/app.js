/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');
window.Moment = require("moment");
window.Moment.locale("pt");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// import store from './store/store';
// const DevicePage = () => import('./components/DevicePage.vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.App = window.App;

Vue.component("navbar", require("./components/navbarDroppable.vue").default);

const ImageSlideshow = () => import("./components/ImageSlideShow.vue");
const Rating = () => import("./components/Rating.vue");
const DeleteForm = () => import("./components/DeleteForm.vue");

const app = new Vue({
    el: '#app',
		components: {
			ImageSlideshow,
			DeleteForm,
			Rating,
		}
});
