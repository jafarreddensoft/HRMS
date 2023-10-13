<template>
    <HeadersAuth/>
    <div class="flex justify-center items-center max-h-screen p-20">
        <div class="pt-16">
            <h1 class="font-semibold text-4xl text-neutral-900" v-if="showForgetDiv">Forget Password</h1>
            <h1 class="font-semibold text-4xl text-neutral-900" v-else>Sign In</h1>
            <p class="text-base text-neutral-500 pt-2" v-if="!showForgetDiv">Enter your email and password to Sign In!</p>
            <p class="text-base text-neutral-500 pt-2" v-else>Enter your details to change password!</p>
            <span v-if="showForgetDiv">
            <!-- <form class="max-w-6xl" v-on:submit.prevent="onSubmit" v-if="showForgetDiv"> -->
                <span v-if="showForgetDiv && showSentOTPDiv==false">
                    <div class="pt-7">
                        <label class="input-label">Email <span class="text-red-500">*</span></label>
                        <input class="form-control" type="email" placeholder="Please enter your email" v-model="checkEmail"/>
                        <!-- <span v-if="v3$.email.$error" class="error">
                            {{ v3$.email.$errors[0].$message }}
                        </span> -->
                    </div>
                    <div class="pt-10">
                        <button type="submit" :disabled="btnSentLoader" @click="clickToSendOPTEmail()" class="bg-blue-500 rounded text-base font-medium p-3 pr-14 text-white text-center relative block w-full">
                            Sent OTP
                            <span class="absolute top-0 right-0 bottom-0 w-14 bg-blue-700 rounded-r flex items-center justify-center">
                                <span v-if="this.btnSentLoader" class="animate-spin h-6 w-6 border-2 border-white border-r-white/10 border-t-white/10 rounded-full"></span>

                                <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </span >
                <span v-if="showSentOTPDiv">
                    <div class="pt-7">
                        <label class="input-label">Enter OTP <span class="text-red-500">*</span></label>
                        <input class="form-control" type="number" placeholder="Please enter otp" v-model="otp"/>
                    </div>
                    <div class="pt-7">
                        <label class="input-label">New Password <span class="text-red-500">*</span></label>
                        <input class="form-control" type="email" placeholder="Please enter New Password" v-model="newPassword"/>
                    </div>
                    <div class="pt-7">
                        <label class="input-label">Confirm Password <span class="text-red-500">*</span></label>
                        <input class="form-control" type="email" placeholder="Please enter Confirm Password" v-model="confirmPassword"/>
                    </div>
                    <div class="pt-10">
                        <button type="submit" @click="clickToChangePassword()" :disabled="btnChangePasswordLoader" class="bg-blue-500 rounded text-base font-medium p-3 pr-14 text-white text-center relative block w-full">
                            Change Password
                            <span class="absolute top-0 right-0 bottom-0 w-14 bg-blue-700 rounded-r flex items-center justify-center">
                                <span v-if="this.btnChangePasswordLoader" class="animate-spin h-6 w-6 border-2 border-white border-r-white/10 border-t-white/10 rounded-full"></span>

                                <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </span>
                <p class="pt-7">
                    Already registered ? 
                    <router-link to="/login" @click="clickSignUp()" class="text-blue-500 font-medium"> Login</router-link>
                </p>
            <!-- </form> -->
            </span>
            <form class="max-w-6xl" v-on:submit.prevent="onSubmitSignIn" v-else>
                <div class="pt-7">
                    <label class="input-label">Email <span class="text-red-500">*</span></label>
                    <input class="form-control" type="email" placeholder="Please enter your email" v-model="state3.email"/>
                    <span v-if="v3$.email.$error" class="error">
                            {{ v3$.email.$errors[0].$message }}
                        </span>
                </div>

                <div class="pt-7">
                    <label class="input-label">Password <span class="text-red-500">*</span></label>
                    <div class="right-icon-input">
                        <input class="form-control" type="password" placeholder="Please enter your password" v-model="state3.password"/>
                        <span v-if="v3$.password.$error" class="error">
                            {{ v3$.password.$errors[0].$message }}
                        </span>
                        <div class="absolute top-0 right-0">
                            
                        </div>
                    </div>
                    
                </div>

                <div class="flex justify-between pt-4">
                    <div class="check-box">
                        <input type="checkbox" id="loggedin" />
                        <label for="loggedin">Keep me logged in</label>
                    </div>
                    <button type="button" class="text-blue-500 text-base" @click="clickForgetPassword()">
                        Forget password?
                    </button>
                </div>

                <div class="pt-10">
                    <button type="submit" :disabled="btnLoader" class="bg-blue-500 rounded text-base font-medium p-3 pr-14 text-white text-center relative block w-full">
                        Sign In
                        <span class="absolute top-0 right-0 bottom-0 w-14 bg-blue-700 rounded-r flex items-center justify-center">
                            <span v-if="this.btnLoader" class="animate-spin h-6 w-6 border-2 border-white border-r-white/10 border-t-white/10 rounded-full"></span>

                            <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </span>
                    </button>
                </div>

                <p class="pt-7">
                    Not registered yet? 
                    <router-link to="/sign-up" class="text-blue-500 font-medium"> Create an Account</router-link>
                </p>
            </form>
        </div>
    </div>
    <FooterSection/>
</template>
<script>
    import HeadersAuth from './HeadersAuth.vue';
    import FooterSection from './FooterSection.vue';
    import { BASE_URL } from "../../config";
    import axios from "axios";
    import { reactive, computed } from "vue";
    import useValidate from "@vuelidate/core";
    import { required , email} from "@vuelidate/validators";
    import { createToast } from 'mosha-vue-toastify';
    import 'mosha-vue-toastify/dist/style.css';
    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'LogIn',
        components:{
            HeadersAuth,
            FooterSection,
        },
        setup() {
            const state3 = reactive({
                email: '',
                password:''
            })
    
            const rules3 = computed(() => {
                return {
                    email: { required, email },
                    password:{ required}

                }
            })
            const v3$ = useValidate(rules3, state3)
            return {
                state3,
                v3$
            }
        },
        data() {
            return {
                btnLoader: false,
                storage: storage,
                showForgetDiv:false,
                showSentOTPDiv: false,
                btnSentLoader:false,
                btnChangePasswordLoader:false,
                checkEmail:'',
                otp:'',
                newPassword:'',
                confirmPassword:'',
            }
        },
        created(){
            console.log("IP ADDRESS::",this.storage.ipAddress);
        },
        methods:{
            async clickToChangePassword(){
                if(this.newPassword === this.confirmPassword){
                    this.btnChangePasswordLoader = true
                    const formData = {
                                        "email": this.checkEmail,
                                        "otp": this.otp,
                                        "newPassword": this.newPassword,
                                        "confirmPassword": this.confirmPassword,
                                        "ipAddress": this.storage.ipAddress
                                    };

                    console.log(formData);
                    await axios.post(BASE_URL + '/otp-change-password',formData)
                    .then((response)=>{
                        console.log(response.data);
                        this.tostMessage(response.data.success, response.data.message);
                        if(response.data.success == 'success'){
                            console.log("Responce: ",response.data.details);
                            //this.btnChangePasswordLoader = false;
                            this.clickSignUp();
                        }
                    })
                    this.btnChangePasswordLoader = false
                } else {
                    this.tostMessage('warning', 'New Password and Confirm Password must be same');
                }
                
            },
            clickSignUp(){
                this.showSentOTPDiv = false;
                this.showForgetDiv = false;
            },
            async clickToSendOPTEmail(){
                
                this.btnSentLoader = true
                const formData = {
                                    "email": this.checkEmail,
                                    "ipAddress": this.storage.ipAddress
                                };

                console.log(formData);
                await axios.post(BASE_URL + '/check-email',formData)
                .then((response)=>{
                    console.log(response.data);
                    this.tostMessage(response.data.success, response.data.message);
                    if(response.data.success == 'success'){
                        console.log("Responce: ",response.data.details);
                        this.showSentOTPDiv = true;
                    }
                })
                this.btnLoader = false
                
            },
            clickForgetPassword(){
                this.showForgetDiv = true;
            },
            async onSubmitSignIn() {
                this.btnLoader = true
                this.v3$.$validate(this.v3$.$error);
                console.log("ftftft",this.v3$.$error);
                if (!this.v3$.$error) {

                const formData = {"email": this.state3.email,"password":this.state3.password};
                console.log(formData);
                
                await axios.post(BASE_URL + '/sign-in',formData)
                    .then((response)=>{
                        console.log(response.data.companyDetails);
                        this.tostMessage(response.data.success, response.data.message);
                        if(response.data.success == 'success'){
                            console.log("Responce: ",response.data.companyDetails);
                            this.storage.clear();
                            // this.storage.set("companyDetails", response.data.companyDetails);
                            // this.storage.set("company_id", response.data.companyDetails._id);
                            // this.storage.set("ipAddress", this.storage.ipAddress);
                            if(response.data.type=='user'){
                                this.storage.set("employeeDetails", response.data.employeeDetails);
                                this.storage.set("employee_id", response.data.employeeDetails._id);
                                this.storage.set("ipAddress", this.storage.ipAddress);
                                window.location.href = "employee-dashboard/"+response.data.employeeDetails._id;
                            } else {
                                this.storage.set("companyDetails", response.data.companyDetails);
                                this.storage.set("company_id", response.data.companyDetails._id);
                                this.storage.set("ipAddress", this.storage.ipAddress);
                                window.location.href = "dashboard/"+response.data.companyDetails._id;
                            }
                            
                            // console.log(this.storage);
                        }
                    })
                    this.btnLoader = false
                } else {
                    this.btnLoader = false
                    console.log("failure");
                }
            },

            tostMessage(status,message){
                createToast({
                    // title: title,
                    description: message
                },
                {
                type: status,
                timeout: 2500,
                position: 'bottom-right',
                showIcon: 'true'
                })
            },
        }

    }


</script>