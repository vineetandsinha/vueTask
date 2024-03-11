// resources/js/app.js
import Vue from 'vue';
import TaskList from './components/TaskList.vue';

Vue.component('task-list', TaskList);

const app = new Vue({
    el: '#app',
});