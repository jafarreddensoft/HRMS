import axios from "axios";

export const getIpAddressFunction = () => {
    // Your common function logic here
    console.log('This is a common function');
    axios.get('https://api.ipify.org?format=json')
    .then(response => {
        response.data.ip;
        //this.ipAddress = response.data.ip;
        //console.log("IP:",this.ipAddress);
    })
    .catch(error => {
        console.error('Error fetching IP address:', error);
    });
};