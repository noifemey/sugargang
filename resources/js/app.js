require('./bootstrap');

import Vue from 'vue';

// Import your components
import ExampleComponent from './components/ExampleComponent.vue';
import ProductComponent from './components/ProductComponent.vue';
import GraphComponent from './components/GraphComponent.vue';
import AvatarrComponent from './components/AvatarrComponent.vue';
import Bootstrap4Table from 'vue-bootstrap4-table';

// Register your components
Vue.component('example-component', ExampleComponent);
Vue.component('product-component', ProductComponent);
Vue.component('graph-component', GraphComponent);
Vue.component('avatarr-component', AvatarrComponent);
Vue.component('bootstrap-table', Bootstrap4Table);

const app = new Vue({
    el: '#app'
});
