/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Index from './components/Index.vue';
import Create from './components/Create.vue';
import Read from './components/Read.vue';
import Edit from './components/Edit.vue';




const routes = [
	{ path: '/', component: Index},
	{ path: '/create', component: Create},
	{ path: '/read/:id', component: Read, name:'readPost'},
	{ path: '/:id/edit', component: Edit, name:'editPost'},
]


const router = new VueRouter({
	routes// routes:routes
})

const app = new Vue({
	router
}).$mount('#app')

