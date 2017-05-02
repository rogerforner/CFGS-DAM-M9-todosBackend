
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('todos', require('./components/tasks/Todos.vue'));

Vue.component('chat-messages', require('./components/chat/ChatMessages.vue'));
Vue.component('chat-form', require('./components/chat/ChatForm.vue'));

Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

// Vue.component('todo', require('./components/Todo.vue'));

//Vm: view model
const app = new Vue({
    el: '#app',
    data: {
        messages: []
    },

    created() {
        this.fetchMessages();

        Echo.channel('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get('/user/messages').then(response => {
                this.messages = response.data
            });
        },

        addMessage(message) {
            this.messages.push(message)

            axios.post('/messages', message).then(response => {
                console.log(response.data)
            })
        }
    }
});