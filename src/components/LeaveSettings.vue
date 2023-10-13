<template>
    <div v-if="leaveList.length >0">
        <table class="table-auto w-full">
            <thead class="bg-neutral-100 text-xs text-neutral-600 rounded border-b border-neutral-300">
                <tr>
                    <th class="font-medium px-3 py-2.5 w-2/6">Leave Name</th>
                    <th class="font-medium px-3 py-2.5 w-2/6">Leave Type</th>
                    <th class="font-medium px-3 py-2.5 w-1/6">Status</th>
                    <th class="font-medium px-3 py-2.5 w-1/6">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b text-neutral-700" v-for="leave in leaveList" :key="leave._id">
                    <td class="text-sm px-3 py-3">{{ leave.leaveName }}</td>
                    <td class="text-sm px-3 py-3">{{ leave.paidLeave }}</td>
                    <td class="text-sm px-3 py-3">Active</td>
                    <td class="text-sm px-3 py-3">
                        <!-- <button class="px-1.5 text-neutral-600 hover:text-blue-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button> -->
                        <!-- <button class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button> -->
                        <button @click="deleteLeave(leave._id)" class="px-1.5 text-neutral-600 hover:text-red-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="pt-5" v-if="!addLeaveForm">
        <button 
            type="button"
            class="btn-primary-light"
            @click="AddLeave"
        >
            Add Leave
        </button>
    </div>
    <div v-if="addLeaveForm">
        <p class="text-2xl text-neutral-900 font-semibold pt-5">Add Leave Management</p>
        <p class="text-sm text-neutral-500 pt-2 pb-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
        <hr>
    </div>
    <form v-on:submit.prevent="submitLeaveManagementForm" ref="" name="leaveManagementForm" enctype="multipart/form-data">
        <div class="grid grid-cols-3 py-5 gap-7" v-if="addLeaveForm">
            <div class="pt-4">
                <label class="input-label">Leave Name <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" v-model="leavestate.leaveName" placeholder="Enter Leave Name"/>
                <span v-if="v5$?.leaveName.$error" class="error">
                    {{ v5$?.leaveName.$errors[0].$message }}
                </span>
            </div>

            <div class="pt-4">
                <label class="input-label">Leave Icon<span class="text-red-500">*</span></label>
                <label for="dropzone-file" class="flex flex-col w-full border border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100 ">
                    <div class="flex items-center pt-3 pb-3 pl-5">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-gray-500 dark:text-gray-400 pl-3">
                            <span class="font-medium">Click to upload</span>
                        </p>
                    </div>
                    <input id="dropzone-file" type="file" ref="leaveIcon" name="leaveIcon" @input="iconImageUpload" class="hidden" accept="image/*"/>
                </label>
            </div>

            <div class="pt-4">
                <label class="input-label">Paid Leave? <span class="text-red-500">*</span></label>
                <div class="flex pt-2">
                    <div class="radio-group">
                        <input type="radio" name="PaidLeave" id="Paid" value="Paid" v-model="leavestate.paidLeave"/>
                        <label for="Paid" class="radio-label">Paid</label>
                    </div>

                    <div class="ml-8 radio-group">
                        <input type="radio" name="PaidLeave" id="Unpaid" value="Unpaid" v-model="leavestate.paidLeave"/>
                        <label for="Unpaid" class="radio-label">Unpaid</label>
                    </div>
                </div>
                <span v-if="v5$?.paidLeave.$error" class="error">
                    {{ v5$?.paidLeave.$errors[0].$message }}
                </span>
            </div>

            <div class="">
                <label class="input-label">Effective After <span class="text-red-500">*</span></label>
                <div class="flex">
                    <div class="w-1/2 pr-2">
                        <input class="form-control" type="text" placeholder="" v-model="leavestate.effectiveAfter"/>
                    </div>
                    <span v-if="v5$?.effectiveAfter.$error" class="error">
                        {{ v5$?.effectiveAfter.$errors[0].$message }}
                    </span>
                    <select class="form-control-select" v-model="leavestate.effectiveAfterDate">
                        <option value="">Select</option>
                        <option value="year">Year</option>
                        <option value="month">Month</option>
                        <option value="day">Day</option>
                    </select>
                    <span v-if="v5$?.effectiveAfterDate.$error" class="error">
                        {{ v5$?.effectiveAfterDate.$errors[0].$message }}
                    </span>
                </div>
                
            </div>

            <div class="col-span-3">
                <label class="input-label">Leave Financial Year Wise <span class="text-red-500">*</span></label>
                <label for="toggleThree" class="flex cursor-pointer select-none items-center">
                    <div class="relative">
                        <!-- v-model="leaveCarry" -->
                        <input type="checkbox" id="toggleThree" class="sr-only" v-model="leavestate.leaveFinancialYear"  />
                        <div class="block h-8 w-14 rounded-full " :class="{['bg-blue-500']:leavestate.leaveFinancialYear, ['bg-neutral-200']:!leavestate.leaveFinancialYear}"></div>
                        <div class="dot absolute top-1 h-6 w-6 rounded-full transition bg-white duration-300" :class="{['right-1']:leavestate.leaveFinancialYear, ['left-1']:!leavestate.leaveFinancialYear}"></div>
                        <span v-if="v5$?.leaveFinancialYear.$error" class="error">
                            {{ v5$?.leaveFinancialYear.$errors[0].$message }}
                        </span>
                    </div>
                </label>
            </div>
            <div v-if="!leavestate.leaveFinancialYear">
                <label class="input-label">Leave Span From Date <span class="text-red-500">*</span></label>
                <!-- <input class="form-control" type="text" placeholder="" v-model="leavestate.leaveSpanFromDate"/> -->
                <datepicker  v-model="leavestate.leaveSpanFromDate" class="date-field"/>
                <span v-if="v5$?.leaveSpanFromDate.$error" class="error">
                    {{ v5$?.leaveSpanFromDate.$errors[0].$message }}
                </span>
            </div>

            <div v-if="!leavestate.leaveFinancialYear">
                <label class="input-label">Leave Span To Date <span class="text-red-500">*</span></label>
                <!-- <input class="form-control" type="text" placeholder="" v-model="leavestate.leaveSpanToDate"/> -->
                <datepicker  v-model="leavestate.leaveSpanToDate" class="date-field" />
                <span v-if="v5$?.leaveSpanToDate.$error" class="error">
                    {{ v5$?.leaveSpanToDate.$errors[0].$message }}
                </span>
            </div>

            <div class="col-span-3">
                <label class="input-label">Leave Carry Forward <span class="text-red-500">*</span></label>
                <label for="toggleTwo" class="flex cursor-pointer select-none items-center">
                    <div class="relative">
                        <!-- v-model="leaveCarry" -->
                        <input type="checkbox" id="toggleTwo" class="sr-only" v-model="leavestate.leaveCarry"  />
                        <div class="block h-8 w-14 rounded-full " :class="{['bg-blue-500']:leavestate.leaveCarry, ['bg-neutral-200']:!leavestate.leaveCarry}"></div>
                        <div class="dot absolute top-1 h-6 w-6 rounded-full transition bg-white duration-300" :class="{['right-1']:leavestate.leaveCarry, ['left-1']:!leavestate.leaveCarry}"></div>
                        <span v-if="v5$?.leaveCarry.$error" class="error">
                            {{ v5$?.leaveCarry.$errors[0].$message }}
                        </span>
                    </div>
                </label>
            </div>

            <div  class="col-span-3">
                <div class="grid grid-cols-6 gap-5" v-if="leavestate.leaveCarry">
                    <div class="col-span-2">
                        <label class="input-label">Leave Carry forward Limit <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" placeholder="" v-model="leavestate.leaveCurryFwdLimit"/>
                        <!-- <span v-if="v5$?.leaveCurryFwdLimit.$error && leavestate.leaveCarry" class="error">
                            {{ v5$?.leaveCurryFwdLimit.$errors[0].$message }}
                        </span> -->
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Leave Cncashment <span class="text-red-500">*</span></label>
                        <label for="Cncashment" class="flex cursor-pointer select-none items-center">
                            <div class="relative">
                                <!-- v-model="leaveCncashment" -->
                                <input type="checkbox" id="Cncashment" class="sr-only" v-model="leavestate.leaveCncashment" />
                                <div class="block h-8 w-14 rounded-full " :class="{['bg-blue-500']:leavestate.leaveCncashment, ['bg-neutral-200']:!leavestate.leaveCncashment}"></div>
                                <div class="dot absolute top-1 h-6 w-6 rounded-full transition bg-white duration-300" :class="{['right-1']:leavestate.leaveCncashment, ['left-1']:!leavestate.leaveCncashment}"></div>
                            </div>
                            <!-- <span v-if="v5$?.leaveCncashment.$error" class="error">
                                {{ v5$?.leaveCncashment.$errors[0].$message }}
                            </span> -->
                        </label>
                        
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Leave Cncashment Limit <span class="text-red-500">*</span></label>
                        <input type="number" id="leaveCncashmentLimit" class="form-control" v-model="leavestate.leaveCncashmentLimit" />
                        <!-- <select class="form-control-select" v-model="leavestate.leaveCncashmentLimit">
                            <option value="">Select</option>
                            <option value="year">Year</option>
                            <option value="month">Month</option>
                        </select> -->
                        <!-- <span v-if="v5$?.leaveCncashmentLimit.$error" class="error">
                            {{ v5$?.leaveCncashmentLimit.$errors[0].$message }}
                        </span> -->
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-5">
                    <div class="col-span-3 pt-4">
                        <label class="input-label">Leave Applicable For <span class="text-red-500">*</span></label>
                        <div class="flex pt-2">
                            <div class="check-box">
                                <input type="checkbox" v-model="allSelectedLA" name="leaveApplicable" id="All" value="All" @change="selectAllLA"/>
                                <label for="All" class="text-neutral-500">All</label>
                            </div>
                            <div class="ml-5 check-box" v-for="(checkbox, index) in leavestate.leaveApplicable" :key="index">
                                <input type="checkbox" v-model="leavestate.leaveApplicableData" @click="selectOneLA" :value="checkbox.id" :id="checkbox.id"/>
                                <label :for="checkbox.name" class="text-neutral-500">{{ checkbox.name }}</label>
                            </div>
                           
                        </div>
                        <span v-if="v5$?.leaveApplicableData.$error" class="error">
                            {{ v5$?.leaveApplicableData.$errors[0].$message }}
                        </span>
                    </div>
                    <div class="col-span-3 pt-4">
                        <label class="input-label">Marital Status <span class="text-red-500">*</span></label>
                        <div class="flex pt-2">
                            <div class="check-box">
                                <input type="checkbox" v-model="allSelectedMS" name="leaveApplicable" id="All1" value="All" @change="selectAllMS"/>
                                <label for="All1" class="text-neutral-500">All</label>
                            </div>
                            <div class="ml-5 check-box" v-for="(checkbox1, index) in leavestate.MaritalStatus" :key="index">
                                <input type="checkbox" v-model="leavestate.MaritalStatusData" @click="selectOneMS" :value="checkbox1.id" :id="checkbox1.id"/>
                                <label :for="checkbox1.name" class="text-neutral-500">{{ checkbox1.name }}</label>
                            </div>
                        </div>
                        <span v-if="v5$?.MaritalStatusData.$error" class="error">
                            {{ v5$?.MaritalStatusData.$errors[0].$message }}
                        </span>
                    </div>

                    <div class="col-span-2">
                        <label class="input-label">Department <span class="text-red-500">*</span></label>
                        <select class="form-control-select" v-model="leavestate.leaveDepartment"  v-on:change="getDesignationByDepartmentIdWiseList(leavestate.leaveDepartment)">
                            <option disabled value="">Select</option>
                            <!-- <option value="year" >Year</option> -->
                            <option v-for="department in departmentList" :key="department._id" :value="department._id">{{ department.name }}</option>
                            <option value="all" >All</option>
                        </select>
                        <span v-if="v5$?.leaveDepartment.$error" class="error">
                            {{ v5$?.leaveDepartment.$errors[0].$message }}
                        </span>
                    </div>
                    
                    <div class="col-span-2">
                        <label class="input-label">Designation <span class="text-red-500">*</span></label>
                        <select class="form-control-select" v-model="leavestate.leaveDesignation">
                            <option value="">Select</option>
                            <option v-for="desidnation in designationList" :key="desidnation._id" :value="desidnation._id">{{ desidnation.name }}</option>
                            <option value="all" >All</option>
                        </select>
                        <span v-if="v5$?.leaveDesignation.$error" class="error">
                            {{ v5$?.leaveDesignation.$errors[0].$message }}
                        </span>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Location <span class="text-red-500">*</span></label>
                        <select class="form-control-select" v-model="leavestate.location">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span v-if="v5$?.location.$error" class="error">
                            {{ v5$?.location.$errors[0].$message }}
                        </span>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Sandwich Leave <span class="text-red-500">*</span></label>
                        <select class="form-control-select" v-model="leavestate.leaveSandwitch">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span v-if="v5$?.leaveSandwitch.$error" class="error">
                            {{ v5$?.leaveSandwitch.$errors[0].$message }}
                        </span>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Leave Duration <span class="text-red-500">*</span></label>
                        <div class="flex pt-2">
                            <div class="check-box">
                                <input type="checkbox" v-model="leavestate.leaveDuration" name="halfDay" id="fullDay" value="Full Day"/>
                                <label for="fullDay" class="text-neutral-500">Full Day</label>
                            </div>

                            <div class="ml-8 check-box">
                                <input type="checkbox" v-model="leavestate.leaveDuration" name="halfDay" id="halfDay" value="Half Day"/>
                                <label for="halfDay" class="text-neutral-500">Half Day</label>
                            </div>
                        </div>
                        <span v-if="v5$?.leaveDuration.$error" class="error">
                            {{ v5$?.leaveDuration.$errors[0].$message }}
                        </span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="pt-5" v-if="addLeaveForm">
        <button 
            type="submit"
            class="btn-primary-light"
        >
            Submit Leave
        </button>
    </div>
    </form>
    <div class="flex justify-between pt-8">
        <button 
            type="submit"
            class="btn-gray-light"
            @click="closeModal"
        >
            Skip to Default
        </button>

        <!-- <button 
            type="button" 
            class="ml-auto mr-2 btn-primary-light"
            @click="closeModal"
        >
            Skip this Step
        </button> -->
        <!-- @click="closeModalProceed" -->
        <!-- @click="submitLeaveManagementForm,closeModalProceed" -->
        <button 
            type="button"
            class="btn-primary"
            @click="closeModal"
        >
            Proceed
        </button>
    </div>
</template>

<script>
    import { reactive, computed } from "vue";
    import useValidate from "@vuelidate/core";
    import { required } from "@vuelidate/validators";
    import Datepicker from 'vue3-datepicker';

    // import { reactive } from "vue"
    import { BASE_URL } from "../config";
    import axios from "axios";
    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'LeaveSettings',
        components:{
            Datepicker
        },
        setup() {
            const leavestate = reactive({
                leaveName: '',
                leaveIcon:'',
                paidLeave: '',
                effectiveAfter: '',
                effectiveAfterDate: '',
                leaveSpanFromDate: new Date(),
                leaveSpanToDate:new Date(),
                leaveCarry: false,
                leaveFinancialYear:'',
                leaveCurryFwdLimit:'',
                leaveCncashment:'',
                leaveCncashmentLimit:'',
                leaveApplicable:[
                    { id: 'Male', name: 'Male' },
                    { id: 'Female', name: 'Female' },
                    { id: 'Other', name: 'Other' }
                ],
                leaveApplicableData:[],
                MaritalStatus:[
                    { id: 'Single', name: 'Single' },
                    { id: 'Married', name: 'Married' },
                    { id: 'Widowed', name: 'Widowed' },
                    { id: 'Divorcee', name: 'Divorcee' }
                ],
                MaritalStatusData:[],
                leaveDepartment:'',
                location:'',
                leaveDesignation:'',
                leaveSandwitch:'',
                leaveDuration:[],

            })

            //const formData = reactive({ ...leavestate });

            const rules5 = computed(() => {
                return {
                    leaveName: { required },
                    paidLeave: { required },
                    effectiveAfter:{ required},
                    effectiveAfterDate:{ required},
                    leaveSpanFromDate:{ required},
                    leaveSpanToDate:{ required},
                    leaveCarry:{ required},
                    leaveFinancialYear:{ required},
                    // leaveCurryFwdLimit:{ required},
                    // leaveCncashment:{ required},
                    // leaveCncashmentLimit:{ required},
                    leaveApplicableData:{ required},
                    MaritalStatusData:{ required},
                    leaveDepartment:{ required},
                    location:{ required},
                    leaveDesignation:{ required},
                    leaveSandwitch:{ required},
                    leaveDuration:{ required},
                };
            });

            const v5$ = useValidate(rules5, leavestate);
            const resetForm = () => {
                leavestate.name = "";
                leavestate.email = "";
                // reset other form fields
                leavestate.leaveName =  '';
                leavestate.leaveIcon = '';
                leavestate.paidLeave =  '';
                leavestate.effectiveAfter =  '';
                leavestate.effectiveAfterDate =  '';
                leavestate.leaveSpanFromDate =  new Date();
                leavestate.leaveSpanToDate = new Date();
                leavestate.leaveCarry = false;
                leavestate.leaveFinancialYear = '';
                leavestate.leaveCurryFwdLimit = '';
                leavestate.leaveCncashment = '';
                leavestate.leaveCncashmentLimit = '';
                leavestate.leaveApplicable = [
                    { id: 'Male', name: 'Male' },
                    { id: 'Female', name: 'Female' },
                    { id: 'Other', name: 'Other' }
                ];
                leavestate.leaveApplicableData = [];
                leavestate.MaritalStatus = [
                    { id: 'Single', name: 'Single' },
                    { id: 'Married', name: 'Married' },
                    { id: 'Widowed', name: 'Widowed' },
                    { id: 'Divorcee', name: 'Divorcee' }
                ];
                leavestate.MaritalStatusData = [];
                leavestate.leaveDepartment = '';
                leavestate.location = '';
                leavestate.leaveDesignation = '';
                leavestate.leaveSandwitch = '';
                leavestate.leaveDuration = [];

                // Object.assign(formData, leavestate);
                // Object.keys(v5$).forEach((key) => {
                //     //v5$[key].$pending = false;
                //     v5$[key].$error = false;
                //     //v5$[key].$params.required.dirty = false;
                // });
            };

            return {
                leavestate,
                v5$,
                resetForm
            }
        },
        data() {
            return {
                storage: storage,
                leaveList:[],
                departmentList:[],
                designationList:[],
                leaveName: '',
                leaveIcon:'',
                paidLeave: '',
                effectiveAfter: '',
                effectiveAfterDate: '',
                leaveSpanFromDate: new Date(),
                leaveSpanToDate:new Date(),
                leaveCarry:'',
                leaveFinancialYear:'',
                leaveCurryFwdLimit:'',
                leaveCncashment:'',
                leaveCncashmentLimit:'',
                leaveApplicable:[],
                leaveApplicableData:[],
                MaritalStatus:[],
                MaritalStatusData:[],
                leaveDepartment:'',
                location:'',
                leaveDesignation:'',
                leaveSandwitch:'',
                leaveDuration:[],
                // leaveCarry: '',
                // leaveCncashment: "",
                addLeaveForm: false,
                leaveManagementList:{},
                allSelectedLA: false,
                allSelectedMS: false,
            }
        },
        created(){
            //this.getLeaveManagementList();
            this.getLeaveList();
            this.getDesignationList();
            this.getDepartmentList();
        },
        methods:{
            async skipToDefault(){
                const formData2 = {
                    "step": 'leave',
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
            async getDesignationByDepartmentIdWiseList(code){
                const formData = {
                    "code": code
                };
                console.log("data:",formData);
                await axios.post(BASE_URL + '/department-wise-designation-list',formData)
                .then((response)=>{
                    console.log("DESIGNATION LIST:: ",response.data);
                    this.designationList =  response.data.designationList;
                })
            },
            closeModal() {
                this.$emit('callback', false)
            },

            closeModalProceed(){
                // console.log(this.specifyDate)
                this.$emit('callbackProceed', 1)
            },
            AddLeave(){
                this.addLeaveForm = !this.addLeaveForm
            },
            async submitLeaveManagementForm() {
                console.log("SUMBIT:");
                const config = {
                    headers: { "content-type": "multipart/form-data" },
                };
                // console.log("this.state3.uname",this.state3.uname);
                this.v5$.$validate(this.v5$.$error);
                if (!this.v5$.$error) {
                    let formData = new FormData();

                    formData.append("companyId", this.storage.companyDetails._id);
                    formData.append("ipAddress", this.storage.ipAddress);
                    formData.append("leaveName", this.leavestate.leaveName);
                    if (this.leavestate.leaveIcon != "") {
                        formData.append("leaveIcon", this.leavestate.leaveIcon);
                    }

                    formData.append("paidLeave", this.leavestate.paidLeave);
                    formData.append("effectiveAfter", this.leavestate.effectiveAfter);
                    formData.append("effectiveAfterDate", this.leavestate.effectiveAfterDate);
                    formData.append("leaveSpanFromDate", this.leavestate.leaveSpanFromDate);
                    formData.append("leaveSpanToDate", this.leavestate.leaveSpanToDate);
                    formData.append("leaveCarry", this.leavestate.leaveCarry);
                    formData.append("leaveFinancialYear", this.leavestate.leaveFinancialYear);
                    formData.append("leaveCurryFwdLimit", this.leavestate.leaveCurryFwdLimit);
                    formData.append("leaveCncashment", this.leavestate.leaveCncashment);
                    formData.append("leaveCncashmentLimit", this.leavestate.leaveCncashmentLimit);
                    formData.append("leaveApplicable", JSON.stringify(this.leavestate.leaveApplicable));
                    formData.append("leaveApplicableData", this.leavestate.leaveApplicableData);
                    formData.append("MaritalStatus", JSON.stringify(this.leavestate.MaritalStatus));
                    formData.append("MaritalStatusData", this.leavestate.MaritalStatusData);
                    formData.append("leaveDepartment", this.leavestate.leaveDepartment);
                    formData.append("location", this.leavestate.location);
                    formData.append("leaveDesignation", this.leavestate.leaveDesignation);
                    formData.append("leaveSandwitch", this.leavestate.leaveSandwitch);
                    formData.append("leaveDuration", JSON.stringify(this.leavestate.leaveDuration));

                    if( this.leavestate.leaveName || 
                        this.leavestate.leaveIcon || 
                        this.leavestate.paidLeave || 
                        this.leavestate.effectiveAfter || 
                        this.leavestate.effectiveAfterDate || 
                        this.leavestate.leaveSpanFromDate || 
                        this.leavestate.leaveSpanToDate || 
                        this.leavestate.leaveCarry || 
                        this.leavestate.leaveFinancialYear || 
                        // this.leavestate.leaveCurryFwdLimit || 
                        // this.leavestate.leaveCncashment || 
                        // this.leavestate.leaveCncashmentLimit || 
                        this.leavestate.leaveApplicable || 
                        this.leavestate.leaveApplicableData || 
                        this.leavestate.MaritalStatus || 
                        this.leavestate.MaritalStatusData || 
                        this.leavestate.leaveDepartment || 
                        this.leavestate.location || 
                        this.leavestate.leaveDesignation || 
                        this.leavestate.leaveSandwitch || 
                        this.leavestate.leaveDuration
                    ){
                        console.log("FORM DATA: ",formData);
                        await axios.post(BASE_URL + '/submit-leave-management-form',formData,config)
                        .then((response)=>{
                            console.log("Response:",response.data);
                            this.closeModal();
                            this.getLeaveList();
                            //this.leavestate = {};
                            this.resetForm();
                            // this.leavestate.leaveName = '';
                            // this.leavestate.leaveIcon = '';
                            // this.leavestate.paidLeave = '';
                            // this.leavestate.effectiveAfter = '';
                            // this.leavestate.effectiveAfterDate = '';
                            // this.leavestate.leaveSpanFromDate = new Date();
                            // this.leavestate.leaveSpanToDate = new Date();
                            // this.leavestate.leaveCarry = '';
                            // this.leavestate.leaveCurryFwdLimit = '';
                            // this.leavestate.leaveCncashment = '';
                            // this.leavestate.leaveCncashmentLimit = '';
                            // this.leavestate.leaveApplicable = [];
                            // this.leavestate.leaveApplicableData = [];
                            // this.leavestate.MaritalStatus = [];
                            // this.leavestate.MaritalStatusData = [];
                            // this.leavestate.leaveDepartment = '';
                            // this.leavestate.location = '';
                            // this.leavestate.leaveDesignation = '';
                            // this.leavestate.leaveSandwitch = '';
                            // this.leavestate.leaveDuration = [];
                            // this.leavestate = {};
                            // this.leavestate.leaveApplicable = [];
                            // this.leavestate.leaveApplicableData = [];
                            // this.leavestate.MaritalStatus = [];
                            // this.leavestate.MaritalStatusData = [];
                            // this.leavestate.leaveSpanFromDate = new Date();
                            // this.leavestate.leaveSpanToDate = new Date();
                        })
                    } else {
                        console.log("ERROR2:");
                    }
                    
                } else {
                    console.log("ERROR:");
                }
            },
            async getDepartmentList() {
                const formData = {
                    "company_id":this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/department-list2',formData)
                .then((response)=>{
                    this.departmentList =  response.data.departmentList;
                    console.log("LEAVE DEPARTMENT LIST:: ",response.data);
                })
            },
            async getDesignationList() {
                const formData = {
                    "company_id":this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/designation-list2',formData)
                .then((response)=>{
                    this.designationList =  response.data.designationList;
                    console.log("LEAVE DESIGNATION LIST:: ",response.data);
                })
            },
            async getLeaveList(){
                const leaveData = {
                    "companyId": this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/leave-list',leaveData)
                .then((response)=>{
                    this.leaveList =  response.data.leaveList;
                    console.log("LEAVE LIST:: ",response.data);
                }).catch(error => {
                    // Handle error
                    if (error.response) {
                    // The request was made and the server responded with a status code
                    console.log(error.response.data);
                    console.log(error.response.status);
                    } else if (error.request) {
                    // The request was made but no response was received
                    console.log(error.request);
                    } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                    }
                });
            },
            async deleteLeave(id){
                if (id) {
                    const formData = {
                        "id": id
                    };
                    console.log("data:",formData);
                    await axios.post(BASE_URL + '/delete-leave',formData)
                    .then((response)=>{
                        //this.departmentList;
                        console.log("DELETE RES",response.data);
                        this.getLeaveList();
                    })
                } else {
                    console.log("addNewDesignation: must be value");
                }
            },
            iconImageUpload(e) {
                const file = e.target.files[0];
                this.leavestate.leaveIcon = file;
                this.iconPath = URL.createObjectURL(file);
                console.log("Icon: ", this.leavestate.leaveIcon);
            },
            selectAllLA() {
                console.log("CHECKED:");
                this.leavestate.leaveApplicableData = [];

                if (this.allSelectedLA) {
                    for (let checkbox in this.leavestate.leaveApplicable) {
                        this.leavestate.leaveApplicableData.push(this.leavestate.leaveApplicable[checkbox].id.toString());
                    }
                }
            },
            selectOneLA() {
                console.log("CHECKED ONE")
                this.allSelectedLA = false;
            },
            selectAllMS() {
                console.log("CHECKED2:");
                this.leavestate.MaritalStatusData = [];

                if (this.allSelectedMS) {
                    for (let checkbox1 in this.leavestate.MaritalStatus) {
                        this.leavestate.MaritalStatusData.push(this.leavestate.MaritalStatus[checkbox1].id.toString());
                    }
                }
            },
            selectOneMS() {
                console.log("CHECKED2 ONE")
                this.allSelectedMS = false;
            }
        },

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

