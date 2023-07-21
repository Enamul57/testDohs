import './bootstrap';
import {createApp} from 'vue';
import app from './layouts/app.vue';
import router from './routes.js';


const App= createApp(app);

import User from './helpers/User.js';
window.User = User;





App.use(router);

App.mount('#app');

