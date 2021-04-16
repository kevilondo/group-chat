/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');
const { default: Echo } = require('laravel-echo');

require('./bootstrap');

window.Vue = require('vue').default;

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('message', require('./components/message.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted(){
        
        //we assign the value of this to this variable in order to access the value of chat inside data inside our http request
        var vm = this

        //we get the group id in the url
        const url = window.location.href;
        const groupId = url.split("/").slice(-1)[0];
        vm.groupId = groupId;

        axios.get('/show_messages/' + groupId)
        .then(res => {
            //push every message one by one
            res.data.messages.map(message => {
                vm.chat.push(message)
            });
        })
        .catch(error => {
            console.log(error)
        })

        window.Echo.private('message-channel')
        .listen('MessageEvent', (e) => {
            vm.chat.push(e.message)
        });
    },
    data: {
        message: '',
        groupId: null,
        chat: [
            
        ],
    },
    methods: {
        send_message (event) {
            event.preventDefault();
            
            let token = document.head.querySelector('meta[name="csrf-token"]');

            axios.post('/send_message/'+ this.groupId, {message: this.message}, {'X-CSRF-TOKEN': token})
            .then(res => {
                this.message = ''
            })
            .catch(error => {
                console.log(error)
            })
        }
    }

});
