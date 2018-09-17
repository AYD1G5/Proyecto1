require('./bootstrap');
// Codigo para el video Chat
import VueChatScroll from 'vue-chat-scroll';
import VueTimeago from 'vue-timeago';
// Termina codigo video Chat
window.Vue = require('vue');

Vue.component('chat-component', require('./components/ChatComponent.vue'));
Vue.component('user-component', require('./components/UserComponent.vue'));
Vue.component('chat-messages-component', require('./components/ChatMessageComponent.vue'));
Vue.component('chat-form-component', require('./components/ChatFormComponent.vue'));
Vue.component('message-component', require('./components/MessageComponent.vue'));


// Codigo para el video Chat
Vue.use(VueChatScroll);
Vue.component('chat-room' , require('./components/laravel-video-chat/ChatRoom.vue'));
Vue.component('group-chat-room', require('./components/laravel-video-chat/GroupChatRoom.vue'));
Vue.component('video-section' , require('./components/laravel-video-chat/VideoSection.vue'));
Vue.component('file-preview' , require('./components/laravel-video-chat/FilePreview.vue'));

Vue.use(VueTimeago, {
    name: 'timeago', // component name, `timeago` by default
    locale: 'en-US',
    locales: {
        'en-US': require('vue-timeago/locales/en-US.json')
    }
})

// Termina codigo video Chat

const app = new Vue({
    el: '#app'
});
