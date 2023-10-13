<template>
     <header class="pl-14"></header>
</template>
<script>
    //import { BASE_URL } from "../../config";
    import axios from "axios";
    import 'mosha-vue-toastify/dist/style.css';

    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'HeadersAuth',
        data() {
            return {
                //ipAddress:'',
                storage: storage,
            }
        },
        mounted() {
            // Make a GET request to the ipify API to retrieve the client's public IP address
            axios.get('https://api.ipify.org?format=json')
            .then(response => {
                //this.ipAddress = response.data.ip;
                //console.log("IP:",this.ipAddress);
                this.storage.set("ipAddress", response.data.ip);
            })
            .catch(error => {
                console.error('Error fetching IP address:', error);
            });
        },
        created(){

        }
    }


</script>