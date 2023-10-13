<template>
    <HeadersAuth/>
    <div class="flex justify-center items-center min-h-screen px-20 pt-20">
        <div class="pt-0 w-" v-if="submissionstatus == false">
            <h1 class="font-semibold text-4xl text-neutral-900">Sign Up</h1>
            <p class="text-base text-neutral-500 pt-2">Enter your organization details to get started!</p>
            <form class=" pt-10" v-on:submit.prevent="onSubmit">
                <div class="grid grid-cols-2 gap-7">
                    <div class="">
                        <label class="input-label">User Name <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" v-model="state3.uname" placeholder="Enter your name"/>
                        <span v-if="v3$.uname.$error" class="error">
                            {{ v3$.uname.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Organization Name <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" v-model="state3.orgname" placeholder="Enter your organization name"/>
                        <span v-if="v3$.orgname.$error" class="error">
                            {{ v3$.orgname.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Email <span class="text-red-500">*</span></label>
                        <input class="form-control" type="email" v-model="state3.email" placeholder="mail@simmmple.com"/>
                        <span v-if="v3$.email.$error" class="error">
                            {{ v3$.email.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Phone Number <span class="text-red-500">*</span></label>
                        <input class="form-control" type="tel" v-model="state3.phone" placeholder="Enter your number"/>
                        <span v-if="v3$.phone.$error" class="error">
                            {{ v3$.phone.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Password <span class="text-red-500">*</span></label>
                        <input class="form-control" :type="passwordFieldType" v-model="state3.password" placeholder="Set your password" />
                        <button type="button" @click="switchVisibility">{{passwordbtn}}</button>
                        <span v-if="v3$.password.$error" class="error">
                            {{ v3$.password.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Confirm Password <span class="text-red-500">*</span></label>
                        <input class="form-control"  :type="confirmpasswordpasswordFieldType"  v-model="state3.confirmpassword" placeholder="Confirm your password" />
                        <button type="button" @click="confirmpasswordswitchVisibility">{{confirmpasswordbtn}}</button>
                        <span v-if="v3$.confirmpassword.$error" class="error">
                            {{ v3$.confirmpassword.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Country <span class="text-red-500">*</span></label>
                        <select class="form-control-select" v-model="state3.country">
                            <option class="text-neutral-400">Select Country</option>
                            <option :value="country.code" v-for="country in countryList" :key="country._id" >{{ country.name }}</option>
                        </select>
                        <span v-if="v3$.country.$error" class="error">
                            {{ v3$.country.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="">
                        <label class="input-label">Timezone <span class="text-red-500">*</span></label>
                        <select class="form-control-select" v-model="state3.timezone">
                            <option class="text-neutral-400">Select Timezone</option>
                            <option>GMT+5.30</option>
                            <option>GMT-5.30</option>
                            <option>GMT-5.30</option>
                        </select>
                        <span v-if="v3$.timezone.$error" class="error">
                            {{ v3$.timezone.$errors[0].$message }}
                        </span>
                    </div>

                </div>
                <div class="pt-10">
                    <button type="submit" :disabled="btnLoader" class="bg-blue-500 rounded text-base font-medium p-3 pr-14 text-white text-center relative block w-full">
                        Sign Up
                        <span class="absolute top-0 right-0 bottom-0 w-14 bg-blue-700 rounded-r flex items-center justify-center">
                            <span v-if="this.btnLoader" class="animate-spin h-6 w-6 border-2 border-white border-r-white/10 border-t-white/10 rounded-full"></span>

                            <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
            <p class="pt-7">
                Already registered ?
                <router-link to="/login" class="text-blue-500 font-medium"> Login</router-link>
            </p>
            <!-- <p class="text-sm text-neutral-500 pt-24 pb-5 text-center">© 2023 Reddensoft. All Rights Reserved. Made with love by Sohom Web Media!</p> -->
        </div>
        <div class="pt-0 w-" v-if="submissionstatus == true">
            <p class="text-base text-neutral-500 pt-2">Thank You for your submission. Please verify your email to continue.</p>
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
    import { required , email, minLength, maxLength,sameAs } from "@vuelidate/validators";
    import { createToast } from 'mosha-vue-toastify';
    import 'mosha-vue-toastify/dist/style.css';

    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'SignUp',
        components:{
            HeadersAuth,
            FooterSection,
        },
        setup() {
          const state3 = reactive({
              uname: '',
              orgname:'',
              email: '',
              phone: '',
              country: '',
              timezone: '',
              dateformat:'',
              password:'',
              confirmpassword:'',

          })
    
          const rules3 = computed(() => {
              return {
                  uname: { required },
                  orgname: { required },
                  email: { required, email },
                  phone: { required, minLength: minLength(10), maxLength: maxLength(12) },
                  country:{ required },
                  timezone:{ required },
                //   dateformat:{ required },
                  password:{ required, minLength: minLength(8)},
                  confirmpassword:{ required, sameAsPassword: sameAs(state3.password),},

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
                passwordFieldType: "password",
                passwordbtn: 'Show',
                confirmpasswordpasswordFieldType: "password",
                confirmpasswordbtn: 'Show',
                showValidationMessage: false,
                validationMessage: '',
                submissionstatus: false,
                storage: storage,
                btnDisable:false,
                countryList:[],
            }
        },
        created() {
            this.getCountryList();
            // console.log("IP ADDRESS::",this.storage.ipAddress);
        },
        methods:{
            async getCountryList(){
                await axios.get(BASE_URL + '/country-list')
                .then((response)=>{
                    this.countryList =  response.data.countryList;
                    console.log("COUNTRY LIST:: ",response.data);
                })
            },
            async onSubmit() {
                this.btnLoader = true;
                // console.log("this.state3.uname",this.state3.uname);
                this.v3$.$validate(this.v3$.$error);
                console.log("ftftft",this.v3$.$error);
                if (!this.v3$.$error) {
                    const formData = {
                        "uname": this.state3.uname,
                        "orgname": this.state3.orgname,
                        "email": this.state3.email,
                        "phone": this.state3.phone,
                        "country": this.state3.country,
                        "timezone": this.state3.timezone,
                        "password":this.state3.password,
                        "ipAddress": this.storage.ipAddress
                    };
                    await axios.post(BASE_URL + '/sign-up',formData)
                    .then((response)=>{
                        console.log(response.data);
                        this.tostMessage(response.data.success, response.data.message);
                        if(response.data.success == 'success'){
                            // window.location.href = "/login";
                            this.submissionstatus = true;
                        }
                        this.btnLoader = false;
                    })
                } else {
                    console.log("failure");
                    this.btnLoader = false;
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

            switchVisibility() {
                if (this.passwordbtn == 'Show') {
                    this.passwordbtn = 'Hide';
                } else {
                    this.passwordbtn = 'Show';
                    
                }
                this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
            },

            confirmpasswordswitchVisibility() {
                if (this.confirmpasswordbtn == 'Show') {
                    this.confirmpasswordbtn = 'Hide';
                } else {
                    this.confirmpasswordbtn = 'Show';
                    
                }
                this.confirmpasswordpasswordFieldType = this.confirmpasswordpasswordFieldType === "password" ? "text" : "password";
            },

            checkpassword(){
                console.log("yggg");
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                if (passwordRegex.test(this.state3.password)) {
                    this.showValidationMessage = false;
                } else {
                    this.showValidationMessage = true;
                    this.validationMessage = 'Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long.';
                }
            }
        }
    }
</script>