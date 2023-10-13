<template>
    <div>
        <table class="table-auto w-full">
            <thead class="bg-neutral-100 text-xs text-neutral-600 rounded border-b border-neutral-300">
                <tr>
                    <th class="font-medium px-3 py-2.5 w-2/6">Designation Name</th>
                    <th class="font-medium px-3 py-2.5 w-2/6">Number Of Employees</th>
                    <th class="font-medium px-3 py-2.5 w-1/6">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b text-neutral-700">
                    <td class="text-sm px-3 py-3">IT</td>
                    <td class="text-sm px-3 py-3">10</td>
                    <td class="text-sm px-3 py-3">
                        
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
                    <td class="text-sm px-3 py-3">Finance</td>
                    <td class="text-sm px-3 py-3">6</td>
                    <td class="text-sm px-3 py-3">
                        
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
            Add New Department
        </button>
    </div>

    <form  class="">
        <div class="grid grid-cols-3 py-5 gap-7" v-if="addLeaveForm">
            
            <div class="pt-4">
                <label class="input-label">Designation Name <span class="text-red-500">*</span></label>
                <input class="form-control" type="text" placeholder="Select started date"/>
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
        name: 'DesignationsSetting',

        components:{
        },

        data() {
            return {
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
