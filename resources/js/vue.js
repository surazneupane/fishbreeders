import Vue from "vue";

window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window._ = require("lodash");

import vSelect from "vue-select";

Vue.component("v-select", vSelect);
//Main pages
import App from "./components/app.vue";

const app = new Vue({
    el: "#app",
    components: { App }
});

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
