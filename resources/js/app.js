require('./bootstrap');
import { createApp } from 'vue';
import Main from './components/Main.vue';



const create_App = createApp(Main);
create_App.mount("#app");




