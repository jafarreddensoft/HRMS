<template>
    <div>
        <table class="table-auto w-full" v-if="designationList.length >0">
            <thead class="bg-neutral-100 text-xs text-neutral-600 rounded border-b border-neutral-300">
                <tr>
                    <th class="font-medium px-3 py-2.5 w-2/6">Department Name</th>
                    <th class="font-medium px-3 py-2.5 w-2/6">Designation Name</th>
                    <th class="font-medium px-3 py-2.5 w-1/6">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b text-neutral-700" v-for="designation in designationList" :key="designation._id">
                    <td class="text-sm px-3 py-3" v-if="!designation.editDiv">{{designation.department.name}}</td>
                    <td class="text-sm px-3 py-3" v-else>
                        <!-- <select v-model="designation.departmentId" class="form-control" > -->
                        <select v-model="designation.department._id" class="form-control" >
                            <option v-for="department in departmentList" :key="department._id" :value="department._id">
                            {{ department.name }}</option> 
                        </select>
                        <!-- {{  designation.department._id }} -->
                    </td>
                    <td class="text-sm px-3 py-3" v-if="!designation.editDiv">{{designation.name}}</td>
                    <td class="text-sm px-3 py-3" v-else>
                        <input type="text" v-model="designation.name" class="form-control" placeholder="Enter Designation Name"/>
                    </td>
                    <!-- <td class="text-sm px-3 py-3">10</td> -->
                    <td class="text-sm px-3 py-3">
                        <button v-if="designation.editDiv" v-on:click="clickToEdit(designation)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                        <button v-if="!designation.editDiv" v-on:click="clickToEdit(designation)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                        <button v-else v-on:click="editDesignation(designation._id,designation.name,designation.department._id),clickToEdit(designation)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                            </svg>
                        </button>
                        <button @click="deleteDesignation(designation._id)" class="px-1.5 text-neutral-600 hover:text-red-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <div class="pt-5" v-if="!addDesignationForm">
        <button 
            type="button"
            class="btn-primary-light"
            @click="AddDesignationDiv"
        >
            Add New Designation
        </button>
    </div>
    <div v-if="addDesignationForm">
        <p class="text-2xl text-neutral-900 font-semibold pt-5">Add New Designation</p>
        <p class="text-sm text-neutral-500 pt-2 pb-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
        <hr>
    </div>
    <form v-on:submit.prevent="submitDesignationForm" ref="" name="submitDesignationForm">
        <div class="" v-if="addDesignationForm">
            <div class="grid items-end grid-cols-9 gap-3" v-for="(field, index) in addNewDesignation" :key="index">
                <div class="col-span-8 pt-4">
                    <label class="input-label">Department Name <span class="text-red-500">*</span></label>
                    <select v-model="field.departmentId" class="form-control" >
                        <option v-for="department in departmentList" :key="department._id" :value="department._id">
                        {{ department.name }}</option>
                    </select>
                </div>
                <div class="col-span-8 pt-4">
                    <label class="input-label">Designation Name <span class="text-red-500">*</span></label>
                    <input class="form-control" type="text" v-model="field.designationName" placeholder="Enter Designation Name"/>
                </div>
                <div class="col-span-1">
                    <button v-if="addNewDesignation.length > 1" type="button" class="inline-block p-3 text-red-500 border border-red-200 rounded bg-red-50" @click="removeDesignation(index)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <button type="button" class="px-5 mt-5 py-2 text-sm font-semibold text-blue-500 rounded bg-blue-50" @click="addDesignation">
                Add More
            </button>
        </div>

        <div class="flex justify-between pt-8">
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
            <!-- @click="closeModalProceed" -->
            <button 
                type="submit"
                class="btn-primary"
            >
                Proceed
            </button>
        </div>

    </form>
</template>

<script>
    import { BASE_URL } from "../config";
    import axios from "axios";
    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'DesignationsSetting',
        components:{
        },

        data() {
            return {
                storage: storage,
                addDesignationForm: false,
                addNewDesignation:[
                    {departmentId:'',designationName:""}
                ],
                departmentList:[],
                designationList:[],
            }
        },
        created(){
            this.getDepartmentList();
            this.getDesignationList();
            //this.insertdesignation();
        },
        methods:{
            async skipToDefault(){
                const formData2 = {
                    "step": 'designation',
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
            skipThisStep(){
                this.$emit('callbackProceed', 1)
            },
            async insertdesignation(){
                const formData = {
                    "company_id":this.storage.companyDetails._id,
                    "ipAddress":this.storage.ipAddress
                };
                await axios.post(BASE_URL + '/insert-designation',formData)
                .then((response)=>{
                    this.departmentList =  response.data.departmentList;
                    console.log("LEAVE DEPARTMENT LIST:: ",response.data);
                })
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
            clickToEdit(designation){
                //this.editDiv[index] = true;
                designation.editDiv = !designation.editDiv; // Toggle the editable stat
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
            async submitDesignationForm() {
                //if (this.addNewDepartment) {
                const formData = {
                    "designationArray": this.addNewDesignation,
                    "company_id":this.storage.companyDetails._id,
                    "ipAddress":this.storage.ipAddress,
                };
                console.log("data:",formData);
                await axios.post(BASE_URL + '/add-designation',formData)
                .then((response)=>{
                    console.log(response.data);
                    this.addNewDesignation = [];
                    this.addDesignationForm = false;
                    this.getDesignationList();
                    this.closeModalProceed();
                })
                // } else {
                //     console.log("addNewDepartment: must be value");
                // }
            },
            async editDesignation(id,name,departmentId){
                if (this.addNewDesignation) {
                    const formData = {
                        "id": id,
                        "designationName": name,
                        "departmentId": departmentId
                    };
                    console.log("data:",formData);
                    await axios.put(BASE_URL + '/edit-designation',formData)
                    .then((response)=>{
                        console.log(response.data);
                        this.getDesignationList();
                        //department.editDiv = false;
                    })
                } else {
                    console.log("addNewDesignation: must be value");
                }
            },
            async deleteDesignation(id){
                if (id) {
                    const formData = {
                        "id": id
                    };
                    console.log("data:",formData);
                    await axios.post(BASE_URL + '/delete-designation',formData)
                    .then((response)=>{
                        //this.departmentList;
                        console.log("DELETE RES",response.data);
                        this.getDesignationList();
                    })
                } else {
                    console.log("addNewDesignation: must be value");
                }
            },
            closeModal() {
                this.$emit('callback', false)
            },

            closeModalProceed(){
                // console.log(this.specifyDate)
                this.$emit('callbackProceed', 1)
            },

            AddDesignationDiv(){
                this.addDesignationForm = !this.addDesignationForm
            },
            addDesignation() {
                this.addNewDesignation.push({designationName:""}); 
            },
            removeDesignation(index) {
                this.addNewDesignation.splice(index, 1); 
            },
        },
    }
</script>
