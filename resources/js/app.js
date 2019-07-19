require('./bootstrap');

window.Vue = require('vue');
//import Vue from 'vue'
/*..............Vuex.................*/
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index'

const store = new Vuex.Store({
  storeData
})

/*............vue router.............*/
import VueRouter from 'vue-router'
Vue.use(VueRouter)

/*............routes..................*/
import {routes} from './routes'

const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history'
})

/*.............main vue................*/
Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);

/*.............V-form..................*/
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

/*...............sweet alert2..............*/
import Swal from 'sweetalert2'
window.Swal = Swal; 
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

Vue.Toast = Toast;




const app = new Vue({
    el: '#app',
    router,
    store
});
