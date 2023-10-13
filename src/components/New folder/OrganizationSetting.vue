<template>
    <form v-on:submit.prevent="submitForm" ref="form" name="form">
        <div class="grid grid-cols-2 gap-7 py-5">
            <div class="">
                <label class="input-label">User Name <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" v-model="state3.uname" placeholder="Enter your name"/>
                <!-- <span v-if="v3$.uname.$error" class="error">
                    {{ v4$.leaveName.$errors[0].$message }}
                </span> -->
            </div>

            <div class="">
                <label class="input-label">Organization Name <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" v-model="state3.orgname" placeholder="Enter your organization name"/>
            </div>

            <div class="">
                <label class="input-label">Email <span class="text-red-500">*</span></label>
                <input class="form-control" type="email" v-model="state3.email" placeholder="mail@simmmple.com"/>
            </div>

            <div class="">
                <label class="input-label">Phone Number <span class="text-red-500">*</span></label>
                <input class="form-control" type="tel" v-model="state3.phone" placeholder="Enter your number"/>
            </div>

            <div class="">
                <label class="input-label">Country <span class="text-red-500">*</span></label>
                <select class="form-control">
                    <option class="text-neutral-400">Select Country</option>
                    <option>India</option>
                    <option>USA</option>
                    <option>Canada</option>
                </select>
            </div>

            <div class="">
                <label class="input-label">Timezone <span class="text-red-500">*</span></label>
                <select class="form-control-select" v-model="state3.country">
                    <option class="text-neutral-400" disabled>Select Timezone</option>
                    <option>GMT+5.30</option>
                    <option>GMT-5.30</option>
                    <option>GMT-5.30</option>
                </select>
            </div>

            <div class="">
                <label class="input-label">Date Format <span class="text-red-500">*</span></label>
                <select class="form-control-select" v-model="state3.dateformat">
                    <option class="text-neutral-400" disabled>Select Date Format</option>
                    <option>YYYY-MM-DD</option>
                    <option>MM-DD-YYYY</option>
                    <option>DD-MM-YYYY</option>
                </select>
            </div>

            <div class="">
                <label class="input-label">Time Format <span class="text-red-500">*</span></label>
                <select class="form-control-select" v-model="state3.timezone">
                    <option class="text-neutral-400" disabled>Select Time Format</option>
                    <option>24 Hours</option>
                    <option>12 Hours</option>
                </select>
            </div>
        </div>

        <div class="pt-8 flex justify-between">
            <button 
                type="button" 
                class="btn-gray-light"
                @click="closeModal"
            >
                Skip to Default
            </button>

            <button 
                type="button" 
                class="ml-auto mr-2 btn-primary-light"
                @click="closeModal"
            >
                Skip this Step
            </button>

            <button 
                type="button"
                class="btn-primary"
                @click="submitForm"
            >
                Proceed
            </button>
        </div>
    </form>
</template>

<script>
    // import { defineComponent } from 'vue';
    // import { reactive } from "vue"
    import { BASE_URL } from "../config";
    import axios from "axios";
    import { reactive } from "vue";
    // import useValidate from "@vuelidate/core";
    // import { required } from "@vuelidate/validators";

    // import { required, email, minLength, maxLength } from "@vuelidate/validators"
    
    // import {useValidate} from "@vuelidate/core"

    export default {
        name: 'OrganizationSetting',
      setup() {
          const state3 = reactive({
              uname: '',
              orgname:'',
              email: '',
              phone: '',
              country: '',
              timezone: '',
              dateformat:''
          })
    
        //   const rules3 = computed(() => {
        //     //   return {
        //     //       uname: { required },
        //     //       orgname: { required },
        //     //       email: { required, email },
        //     //       phone: { required, minLength: minLength(10), maxLength: maxLength(12) },
        //     //       country:{ required },
        //     //       timezone:{ required },
        //     //       dateformat:{ required },

        //     //   }
        //   })
        //   const v3$ = useValidate(rules3, state3)
    
          return {
              state3,
            //   v3$
          }
      },
        data() {
           
        },

        // async created(event){
        //     console.log();
        // },

        methods:{
            closeModal() {
                this.$emit('callback', false)
            },

            closeModalProceed(){
                this.$emit('callbackProceed', 1)
            },

            async submitForm() {
                // console.log("this.state3.uname",this.state3.uname);

                const formData = {"uname": this.state3.uname,"orgname": this.state3.orgname,"email": this.state3.email,"phone": this.state3.phone,
                "country": this.state3.country,"timezone": this.state3.timezone,"dateformat": this.state3.dateformat};
                
                await axios.post(BASE_URL + '/sign-up',formData)
                    .then((response)=>{
                        console.log(response.data);
                    })
            }
        }

    }
</script>