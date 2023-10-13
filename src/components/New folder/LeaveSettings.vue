<template>
    <div>
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
                <tr class="border-b text-neutral-700">
                    <td class="text-sm px-3 py-3">Casual</td>
                    <td class="text-sm px-3 py-3">Paid</td>
                    <td class="text-sm px-3 py-3">Active</td>
                    <td class="text-sm px-3 py-3">
                        <button class="px-1.5 text-neutral-600 hover:text-blue-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                        <button class="px-1.5 text-neutral-600 hover:text-red-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="border-b text-neutral-700">
                    <td class="text-sm px-3 py-3">Medical</td>
                    <td class="text-sm px-3 py-3">Paid</td>
                    <td class="text-sm px-3 py-3">Active</td>
                    <td class="text-sm px-3 py-3">
                        <button class="px-1.5 text-neutral-600 hover:text-blue-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                        <button class="px-1.5 text-neutral-600 hover:text-red-500 transition-all">
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

    <form  class="">
        <div class="grid grid-cols-3 py-5 gap-7" v-if="addLeaveForm">
            
            <div class="pt-4">
                <label class="input-label">Leave Name <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" placeholder="Select started date"/>
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
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>

            <div class="pt-4">
                <label class="input-label">Paid Leave? <span class="text-red-500">*</span></label>
                <div class="flex pt-2">
                    <div class="radio-group">
                        <input type="radio" name="PaidLeave" id="Paid" value="Paid"/>
                        <label for="Paid" class="radio-label">Paid</label>
                    </div>

                    <div class="ml-8 radio-group">
                        <input type="radio" name="PaidLeave" id="Unpaid" value="Unpaid"/>
                        <label for="Unpaid" class="radio-label">Unpaid</label>
                    </div>
                </div>
            </div>

            <div>
                <label class="input-label">Effective After <span class="text-red-500">*</span></label>
                <div class="flex">
                    <div class="w-1/2 pr-2">
                        <input class="form-control" type="text" placeholder=""/>
                    </div>
                    
                    <select class="form-control-select">
                        <option>Select</option>
                        <option>Year</option>
                        <option>Month</option>
                        <option>Day</option>
                    </select>
                </div>
                
            </div>

            <div>
                <label class="input-label">Leave Span From Date <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" placeholder=""/>
            </div>

            <div>
                <label class="input-label">Leave Span To Date <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" placeholder=""/>
            </div>

            <div>
                <label class="input-label">Leave Carry Forward <span class="text-red-500">*</span></label>
                <label for="toggleTwo" class="flex cursor-pointer select-none items-center">
                    <div class="relative">
                        <input type="checkbox" id="toggleTwo" class="sr-only" v-model="leaveCarry" />
                        <div class="block h-8 w-14 rounded-full " :class="{['bg-blue-500']:leaveCarry, ['bg-neutral-200']:!leaveCarry}"></div>

                        <div class="dot absolute top-1 h-6 w-6 rounded-full transition bg-white duration-300" :class="{['right-1']:leaveCarry, ['left-1']:!leaveCarry}"></div>
                    </div>
                </label>
            </div>

            <div  class="col-span-3">
                <div class="grid grid-cols-6 gap-5" v-if="leaveCarry">
                    <div class="col-span-2">
                        <label class="input-label">Leave Carry forward Limit <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" placeholder=""/>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Leave Cncashment <span class="text-red-500">*</span></label>
                        <label for="Cncashment" class="flex cursor-pointer select-none items-center">
                            <div class="relative">
                                <input type="checkbox" id="Cncashment" class="sr-only" v-model="leaveCncashment" />
                                <div class="block h-8 w-14 rounded-full " :class="{['bg-blue-500']:leaveCncashment, ['bg-neutral-200']:!leaveCncashment}"></div>

                                <div class="dot absolute top-1 h-6 w-6 rounded-full transition bg-white duration-300" :class="{['right-1']:leaveCncashment, ['left-1']:!leaveCncashment}"></div>
                            </div>
                        </label>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Leave Cncashment Limit <span class="text-red-500">*</span></label>
                        <select class="form-control-select">
                            <option>Select</option>
                            <option>Year</option>
                            <option>Month</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-5">
                    <div class="col-span-3 pt-4">
                        <label class="input-label">Leave Applicable For <span class="text-red-500">*</span></label>
                        <div class="flex pt-2">
                            <div class="check-box">
                                <input type="checkbox" name="leaveApplicable" id="All" value="All"/>
                                <label for="All" class="text-neutral-500">All</label>
                            </div>

                            <div class="ml-5 check-box">
                                <input type="checkbox" name="leaveApplicable" id="Male" value="Male"/>
                                <label for="Male" class="text-neutral-500">Male</label>
                            </div>
                            <div class="ml-5 check-box">
                                <input type="checkbox" name="leaveApplicable" id="Female" value="Female"/>
                                <label for="Female" class="text-neutral-500">Female</label>
                            </div>
                            <div class="ml-5 check-box">
                                <input type="checkbox" name="leaveApplicable" id="Others" value="Others"/>
                                <label for="Others" class="text-neutral-500">Others</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3 pt-4">
                        <label class="input-label">Marital Status <span class="text-red-500">*</span></label>
                        <div class="flex pt-2">
                            <div class="check-box">
                                <input type="checkbox" name="MaritalStatus" id="Single" value="Single"/>
                                <label for="Single" class="text-neutral-500">Single</label>
                            </div>

                            <div class="ml-5 check-box">
                                <input type="checkbox" name="MaritalStatus" id="Married" value="Married"/>
                                <label for="Married" class="text-neutral-500">Married</label>
                            </div>
                            <div class="ml-5 check-box">
                                <input type="checkbox" name="MaritalStatus" id="Widowed" value="Widowed"/>
                                <label for="Widowed" class="text-neutral-500">Widowed</label>
                            </div>
                            <div class="ml-5 check-box">
                                <input type="checkbox" name="MaritalStatus" id="Divorcee" value="Divorcee"/>
                                <label for="Divorcee" class="text-neutral-500">Divorcee</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="input-label">Department <span class="text-red-500">*</span></label>
                        <select class="form-control-select">
                            <option>Select</option>
                            <option>Year</option>
                            <option>Month</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Location <span class="text-red-500">*</span></label>
                        <select class="form-control-select">
                            <option>Select</option>
                            <option>Year</option>
                            <option>Month</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Designation <span class="text-red-500">*</span></label>
                        <select class="form-control-select">
                            <option>Select</option>
                            <option>Year</option>
                            <option>Month</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label class="input-label">Sandwich Leave <span class="text-red-500">*</span></label>
                        <select class="form-control-select">
                            <option>Select</option>
                            <option>Year</option>
                            <option>Month</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="input-label">Leave Duration <span class="text-red-500">*</span></label>
                        <div class="flex pt-2">
                            <div class="check-box">
                                <input type="checkbox" name="halfDay" id="fullDay" value="Full Day"/>
                                <label for="fullDay" class="text-neutral-500">Full Day</label>
                            </div>

                            <div class="ml-8 check-box">
                                <input type="checkbox" name="halfDay" id="halfDay" value="Half Day"/>
                                <label for="halfDay" class="text-neutral-500">Half Day</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>


           

        </div>

        <div class="flex justify-between pt-8">
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
                @click="closeModalProceed"
            >
                Proceed
            </button>
        </div>

    </form>
</template>

<script>
    
   
    export default {
        name: 'LeaveSettings',

        components:{
        },

        data() {
            return {
                leaveCarry: '',
                leaveCncashment: "",
                addLeaveForm: false,
            }
        },
        methods:{
            
            closeModal() {
                this.$emit('callback', false)
            },

            closeModalProceed(){
                // console.log(this.specifyDate)
                this.$emit('callbackProceed', 1)
            },

            AddLeave(){
                this.addLeaveForm = !this.addLeaveForm
            }

            

        
        },

    }
</script>

