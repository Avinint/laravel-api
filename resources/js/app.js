
require('./bootstrap');

import vueRouter from "vue-router";
import Vuex from "vuex";
import Index from "./Index";
import router from "./routes";
import moment from "moment";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import Success from "./shared/components/Success";
import ValidationErrors from "./shared/components/ValidationErrors";
import storeDefinition from "./store";

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('example-2', require('./components/Example2').default);

Vue.use(vueRouter);
Vue.use(Vuex);
Vue.filter("fromNow", value => moment(value).fromNow());

Vue.component("star-rating", StarRating);
Vue.component("fatal-error", FatalError);
Vue.component("success", Success);
Vue.component("v-errors", ValidationErrors);

const store = new Vuex.Store(storeDefinition);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        index: Index,
    },
    async beforeCreate(){
        this.$store.dispatch("loadStoredState");

        await axios.get('/sanctum/csrf-cookie');
        await axios.post('/login', {
            email: 'maurine57@example.com',
            password: 'password'
        })
    }
});
