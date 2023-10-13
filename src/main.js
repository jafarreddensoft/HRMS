import { createApp } from 'vue';
import App from './App.vue';
import'./index.css';
import router from './Router/index';
const app = createApp({});
app.config.errorHandler = (error, instance, info) => {

    // Handle the error globally
    console.err("Global error:", error);
    console.log("Vue instance:", instance);
    console.log("Error info:", info);
  
    // Add code for UI notifications, reporting or other error handling logic
  };
createApp(App).use(router).mount('#app')
