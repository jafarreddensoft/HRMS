<template>
    <form v-on:submit.prevent="submitForm" ref="form" name="form">
        <div class="grid grid-cols-2 gap-7 py-5">
            <div class="">
                <label class="input-label" for="uname">User Name <span class="text-red-500">*</span></label>
                <input readonly class="form-control" type="text" ref="uname" name="uname" id="uname" v-model="organizationstate.uname" placeholder="Enter your name"/>
                <span v-if="v1$.uname.$error" class="error">
                    {{ v1$.uname.$errors[0].$message }}
                </span>
            </div>

            <div class="">
                <label class="input-label" for="orgname">Organization Name <span class="text-red-500">*</span></label>
                <input readonly class="form-control" type="text" ref="orgname" name="orgname" id="orgname" v-model="organizationstate.orgname" placeholder="Enter your organization name"/>
                <span v-if="v1$.orgname.$error" class="error">
                    {{ v1$.orgname.$errors[0].$message }}
                </span>
            </div>

            <div class="">
                <label class="input-label">Email <span class="text-red-500">*</span></label>
                <input readonly class="form-control" type="email" v-model="organizationstate.email" placeholder="mail@simmmple.com"/>
                <span v-if="v1$.email.$error" class="error">
                    {{ v1$.email.$errors[0].$message }}
                </span>
            </div>

            <div class="">
                <label class="input-label">Phone Number <span class="text-red-500">*</span></label>
                <input readonly class="form-control" type="tel" v-model="organizationstate.phone" placeholder="Enter your number"/>
                <span v-if="v1$.phone.$error" class="error">
                    {{ v1$.phone.$errors[0].$message }}
                </span>
            </div>

            <div class="">
                <label class="input-label">Country <span class="text-red-500">*</span></label>
                <select class="form-control" v-model="organizationstate.country" v-on:change="getCountryStateList(organizationstate.country)">
                    <option class="text-neutral-400" disabled>Select Country</option>
                    <option :value="country.code" v-for="country in countryList" :key="country._id" >{{ country.name }}</option>
                </select>
                <span v-if="v1$.country.$error" class="error">
                    {{ v1$.country.$errors[0].$message }}
                </span>
            </div>
            <div class="">
                <label class="input-label">State <span class="text-red-500">*</span></label>
                <select class="form-control" v-model="organizationstate.state" >
                    <option class="text-neutral-400" disabled>Select State</option>
                    <option :value="state.name" v-for="state in countryStateList.states" :key="state">{{ state.name }}</option>
                </select>
                <span v-if="v1$.state.$error" class="error">
                    {{ v1$.state.$errors[0].$message }}
                </span>
            </div>
            <div class="">
                <label class="input-label">Company Address <span class="text-red-500">*</span></label>
                <textarea class="form-control" type="textarea" v-model="organizationstate.address" placeholder="Enter your address"></textarea>
                <span v-if="v1$.address.$error" class="error">
                    {{ v1$.address.$errors[0].$message }}
                </span>
            </div>
            <div class="">
                <label class="input-label">Timezone <span class="text-red-500">*</span></label>
                <select class="form-control-select" v-model="organizationstate.gmtOffsetName">
                    <option class="text-neutral-400" disabled>Select Timezone</option>
                    <option :value="timez.gmtOffsetName" v-for="timez in countryStateList.timezones" :key="timez">
                        <!-- {{ timez.zoneName }} - {{ timez.tzName }}  -->
                        {{ timez.gmtOffsetName }}</option>
                </select>
                <span v-if="v1$.gmtOffsetName.$error" class="error">
                    {{ v1$.gmtOffsetName.$errors[0].$message }}
                </span>
            </div>
            <div class="">
                <label class="input-label">Date Format <span class="text-red-500">*</span></label>
                <select class="form-control-select" v-model="organizationstate.dateformat">
                    <option class="text-neutral-400" disabled>Select Date Format</option>
                    <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                    <option value="MM-DD-YYYY">MM-DD-YYYY</option>
                    <option value="DD-MM-YYYY">DD-MM-YYYY</option>
                </select>
                <span v-if="v1$.dateformat.$error" class="error">
                    {{ v1$.dateformat.$errors[0].$message }}
                </span>
            </div>

            <div class="">
                <label class="input-label">Time Format <span class="text-red-500">*</span></label>
                <select class="form-control-select" v-model="organizationstate.timezone">
                    <option class="text-neutral-400" disabled>Select Time Format</option>
                    <option value="24 Hours" >24 Hours</option>
                    <option value="12 Hours" >12 Hours</option>
                </select>
                <span v-if="v1$.timezone.$error" class="error">
                    {{ v1$.timezone.$errors[0].$message }}
                </span>
            </div>
            <div class="">
                <label class="input-label">Company Financial Year Type <span class="text-red-500">*</span></label>
                <select class="form-control" v-model="organizationstate.financialYear" >
                    <option class="text-neutral-400" disabled>Select Financial Year Type</option>
                    <option value="CY">Calendar Year (CY): January 1st to December 31st</option>
                    <option value="FY">Fiscal Year (FY): April 1st to March 31st</option>
                </select>
                <span v-if="v1$.financialYear.$error" class="error">
                    {{ v1$.financialYear.$errors[0].$message }}
                </span>
            </div>
        </div>
        <div class="pt-8 flex justify-between">
            <button 
                type="button" 
                class="btn-gray-light"
                @click="skipToDefault"
            >
                Skip to Default
            </button>

            <button 
                type="button" 
                class="ml-auto mr-2 btn-primary-light"
                @click="skipThisStep"
            >
                Skip this Step
            </button>

            <button 
                type="submit"
                class="btn-primary"
            >
            <!-- @click="submitForm" -->
                Proceed
            </button>
        </div>
    </form>
</template>

<script>
    import { reactive, computed } from "vue";
    import useValidate from "@vuelidate/core";
    import { required ,email ,minLength ,maxLength } from "@vuelidate/validators";
    //import { required } from "@vuelidate/validators";
    import { BASE_URL } from "../config";
    import axios from "axios";
    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'OrganizationSetting',
        setup() {
            const organizationstate = reactive({
                uname: '',
                orgname: '',
                email: '',
                phone: '',
                country: '',
                state: '',
                timezone: '',
                gmtOffsetName: '',
                dateformat:'',
                address:'',
                financialYear:'',
            })
    
            const rules1 = computed(() => {
                return {
                    uname: { required },
                    orgname: { required },
                    email: { required, email },
                    phone: { required, minLength: minLength(10), maxLength: maxLength(12) },
                    country:{ required },
                    state:{ required },
                    timezone:{ required },
                    gmtOffsetName:{ required },
                    dateformat:{ required },
                    address:{ required },
                    financialYear:{ required },
                }
            })
            const v1$ = useValidate(rules1, organizationstate)
    
            return {
                organizationstate,
                v1$
            }
        },
        data() {
            return {
                storage: storage,
                countryList:[],
                countryStateList:[],
                organizationDataorganizationData:'',
                name:'',
            }
        },
        async created(){
            this.getOrganizationDetails();
            this.getCountryList();
            //this.getCountryStateList();
            // console.log("COMPANY DETAILS: ",this.storage.companyDetails);
            this.organizationstate.uname = this.storage.companyDetails.uname;
            this.organizationstate.orgname = this.storage.companyDetails.orgname;
            this.organizationstate.email =  this.storage.companyDetails.email;
            this.organizationstate.phone =  this.storage.companyDetails.phone;
            //console.log("////////: ", this.organizationData.country);
        },

        methods:{
            skipThisStep(){
                this.$emit('callbackProceed', 1)
            },
            closeModal() {
                this.$emit('callback', false)
            },
            closeModalProceed(){
                this.$emit('callbackProceed', 1)
            },
            async skipToDefault(){
                const formData2 = {
                    "step": 'organization',
                    "companyId": this.storage.companyDetails._id,
                    "ipAddress": this.storage.ipAddress
                };
                await axios.post(BASE_URL + '/company-details-set-as-default',formData2)
                .then((response)=>{
                    console.log("SET AS DEFAULT DETAILS:: ",response.data);
                    if(response.data.country == 'success'){
                        this.closeModal();
                    }
                })
            },
            async getOrganizationDetails(){
                const formData2 = {
                    "companyId": this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/organization-details',formData2)
                .then((response)=>{
                    console.log("ORGANIZATION DETAILS:: ",response.data.organizationstate.gmtOffsetName);
                    this.organizationstate.country =  response.data.organizationstate.country;
                    this.organizationstate.state =  response.data.organizationstate.state;
                    this.organizationstate.timezone =  response.data.organizationstate.timezone;
                    this.organizationstate.gmtOffsetName =  response.data.organizationstate.gmtOffsetName;
                    this.organizationstate.dateformat = response.data.organizationstate.dateformat;
                    this.organizationstate.address = response.data.organizationstate.address;
                    this.organizationstate.financialYear = response.data.organizationstate.financialYear;
                })
                if(this.organizationstate.country){
                    this.getCountryStateList(this.organizationstate.country);
                }
            },
            async getCountryList(){
                await axios.get(BASE_URL + '/country-list')
                .then((response)=>{
                    this.countryList =  response.data.countryList;
                    console.log("COUNTRY LIST:: ",response.data);
                })
            },
            async getCountryStateList(code){
                const formData = {
                    "code": code
                };
                console.log("data:",formData);
                await axios.post(BASE_URL + '/country-state-list',formData)
                .then((response)=>{
                    console.log("COUNTRY STATE LIST:: ",response.data);
                    this.countryStateList =  response.data.countryStateList;
                })
            },
            async submitForm() {
                // console.log("this.organizationstate.uname",this.organizationstate.uname);
                console.log("CLICKED:",this.v1$.$error);
                this.v1$.$validate();
                if (!this.v1$.$error) {
                    const formData = {
                        "companyId": this.storage.companyDetails._id,
                        "ipAddress": this.storage.ipAddress,
                        "uname": this.organizationstate.uname,
                        "orgname": this.organizationstate.orgname,
                        "email": this.organizationstate.email,
                        "phone": this.organizationstate.phone,
                        "country": this.organizationstate.country,
                        "state": this.organizationstate.state,
                        "timezone": this.organizationstate.timezone,
                        "gmtOffsetName": this.organizationstate.gmtOffsetName,
                        "dateformat": this.organizationstate.dateformat,
                        "financialYear": this.organizationstate.financialYear,
                        "address": this.organizationstate.address
                    };
                    if( this.storage.companyDetails._id 
                        && this.organizationstate.uname
                        && this.organizationstate.orgname
                        && this.organizationstate.email
                        && this.organizationstate.phone
                        && this.organizationstate.country
                        && this.organizationstate.state
                        && this.organizationstate.timezone
                        && this.organizationstate.gmtOffsetName
                        && this.organizationstate.dateformat
                        && this.organizationstate.address
                        && this.organizationstate.financialYear
                        ){
                        await axios.put(BASE_URL + '/update-organization',formData)
                        .then((response)=>{
                            console.log("res: ",response.data);
                            this.closeModalProceed();
                        })
                    } else {
                        console.log("ERROR:");
                    }
                    
                } 
            }
        }
    }
</script>
<style>
    .error {
        display: block;
        padding-bottom: 0.5rem;
        font-size: 0.575rem;
        line-height: 1.25rem;
        --tw-text-opacity: 1;
        color: rgb(239 68 68 / var(--tw-text-opacity));
    }
    .date-field {
        line-height: 1.75rem !important;
    }
</style>