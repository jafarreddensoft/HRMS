<template>
    <AdminLayout>
        <section class="grid grid-cols-7">
            <div class="col-span-7 py-2 px-10">
            <!-- <form class=" pt-10" > -->
            <div class=" pt-10" >

                <div class="flex justify-between items-end pb-8 pt-12">
                    <div>
                        <h2 class="text-3xl font-semibold text-neutral-900">Add Employee</h2>
                    </div>

                    <div>
                        <button @click="HandelCategoryModal" class="ml-auto btn-primary">Add Category</button>
                    </div>
                </div>

                <div class="max-w-5xl">
                    <Disclosure v-for="(data, k) in InformationData" :key="k" as="div" v-slot="{ open }" :defaultOpen="k==0" class="bg-gray-50 border rounded border-gray-200 mt-4">
                        <div class="flex justify-between w-full items-center pr-4">
                            <DisclosureButton class="flex  items-center transition-all justify-between px-4 py-2 text-left text-lg font-medium text-gray-600 hover:text-gray-800 outline-none">
                                <span>
                                    {{ data.name }} 

                                    <small class="block font-light text-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                </span>
                                
                            </DisclosureButton>

                            

                            <!-- <button v-if="open" class="py-1 text-neutral-600 hover:text-red-500 transition-all bg-white px-2 rounded border ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button> -->

                            <div class="px-3 py-4 ml-auto">
                                <Switch
                                    v-model="data.categorystatus" @click="activecategorystatus(data.categorystatus, data.name)"
                                    :class="data.categorystatus ? 'bg-blue-500' : 'bg-gray-200'"
                                    class="relative inline-flex h-[24px] w-[44px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                >
                                <span class="sr-only">Use setting</span>
                                <span
                                    aria-hidden="true"
                                    :class="data.categorystatus ? 'translate-x-5' : 'translate-x-0'"
                                    class="pointer-events-none inline-block h-[20px] w-[20px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
                                />
                                </Switch>
                                
                            </div>

                            <DisclosureButton class="py-1 text-neutral-600 hover:text-red-500 transition-all bg-white px-1.5 rounded border ml-2">
                                
                                <ChevronUpIcon
                                    :class="open ? 'rotate-180 transform' : ''"
                                    class="h-5 w-5 text-gray-500 transition-all"
                                />
                            </DisclosureButton>
                        </div>

                        <!-- Use the built-in `transition` component to add transitions. -->
                       
                        <transition
                        
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-out"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                           
                            <DisclosurePanel>
                                <div class=" overflow-x-auto sm:rounded-lg p-5">
                                    <div class="bg-white p-4">
                                        <table class="w-full text-sm text-left text-neutral-500 ">
                                            <thead class="text-xs text-neutral-700 border-b uppercase border-b-neutral-800 ">
                                                <tr>
                                                    <th scope="col" class="pr-6 py-3 font-semibold">
                                                        Field Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Field Type
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Field Mandatory
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Active Status
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Action
                                                    </th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in data.items" :key="index" class="bg-white border-b text-base">
                                                    <td scope="row" class="pr-6 py-4 font-medium text-neutral-700 whitespace-nowrap">
                                                        {{ item.name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ item.type }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ item.mandatory }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <Switch
                                                            v-model="item.status" @click="activestatus(item.status, item.name)"
                                                            :class="item.status ? 'bg-blue-500' : 'bg-gray-200'"
                                                            class="relative inline-flex h-[24px] w-[44px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                                        >
                                                        <span class="sr-only">Use setting</span>
                                                        <span
                                                            aria-hidden="true"
                                                            :class="item.status ? 'translate-x-5' : 'translate-x-0'"
                                                            class="pointer-events-none inline-block h-[20px] w-[20px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
                                                        />
                                                        </Switch>
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        <div class="flex">
                                                            
                                                            <button class="px-1 text-neutral-600 hover:text-orange-500 transition-all" @click="editfield(item, data.name)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </button>
                                                            <button class="px-1 text-neutral-600 hover:text-red-500 transition-all" @click="deletefield(item, data.name)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <button  @click="ModalOpen(data.name)" class="ml-auto mt-5 mr-2 btn-primary" >
                                                    Add New
                                                </button>
                                                
                                            
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </DisclosurePanel>
                        
                        </transition>
                    </Disclosure>
                </div>

                <!-- <div class="pt-10">
                    <button type="button" class="bg-blue-500 rounded text-base font-medium p-3 pr-14 text-white text-center relative block w-full">
                        Sign Up
                        <span class="absolute top-0 right-0 bottom-0 w-14 bg-blue-700 rounded-r flex items-center justify-center">
                            <span v-if="this.btnLoader" class="animate-spin h-6 w-6 border-2 border-white border-r-white/10 border-t-white/10 rounded-full"></span>

                            <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </span>
                    </button>
                </div> -->
                
            </div>   
            </div>
            
        </section>
    </AdminLayout>


    <TransitionRoot appear :show="isModalOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 backdrop-blur-sm bg-black/30" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                class="flex min-h-full items-center justify-center p-4 text-center"
                >
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0 scale-95"
                    enter-to="opacity-100 scale-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100 scale-100"
                    leave-to="opacity-0 scale-95"
                >
                    <DialogPanel
                    class="w-full max-w-md transform overflow-hidden rounded bg-white p-6 text-left align-middle shadow-xl transition-all"
                    >
                    <DialogTitle
                        as="h3"
                        class="text-lg font-medium leading-6 text-gray-900"
                    >
                        Add Field
                    </DialogTitle>
                    <div class="mt-2">
                        <div>
                            <label class="input-label">Field Name</label>
                            <input class="form-control" type="text" placeholder="Field Name" v-model="addfield.field_name"/>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="input-label">Field Type</label>
                        <select class="form-control" v-model="addfield.field_type">
                            <option class="text-neutral-400">Select Field Type</option>
                            <option>text</option>
                            <option>numeric</option>
                            <option>dropdown</option>
                            <option>file</option>
                            <option>tag</option>
                        </select>
                    </div>

                    <!-- <div class="mt-3" v-if="addfield.field_type == 'dropdown'">
                        <label class="input-label">Field Options</label>
                            <multiselect
                            id="customOptions"
                            v-model="selectedOptions"
                            :options="availableOptions"
                            :multiple="true"
                            :taggable="true"
                            tag-placeholder="Add a custom option"
                            @tag="addCustomOption"
                            ></multiselect>
                    </div> -->

                    <div class="form-group">
                        <label for="cat"><b>Category<font color="red"></font>
                            </b></label>


                        <select size="4" multiple="multiple" name="cat[]" class="form-control"
                            id="cat">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="input-label">Field Mandatory</label>
                        <select class="form-control" v-model="addfield.field_status">
                            <option class="text-neutral-400">Field Mandatory</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="mt-7">
                        <button
                        type="button"
                        class="inline-flex justify-center rounded border border-transparent bg-gray-200 px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                        @click="closeModal"
                        >
                            Cancel
                        </button>

                        <button v-if="editrow == true"
                        type="button"
                        class="inline-flex ml-2 justify-center rounded border border-transparent text-white bg-blue-500 px-4 py-2 text-sm font-medium hover:bg-blue-600 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                        @click="editfieldmodal()"
                        >
                            Update 
                        </button>

                        <button v-else
                        type="button"
                        class="inline-flex ml-2 justify-center rounded border border-transparent text-white bg-blue-500 px-4 py-2 text-sm font-medium hover:bg-blue-600 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                        @click="addfieldmodal()"
                        >
                            Add  
                        </button>
                    </div>
                    </DialogPanel>
                </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>


    <TransitionRoot appear :show="isCategoryModalOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 backdrop-blur-sm bg-black/30" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                class="flex min-h-full items-center justify-center p-4 text-center"
                >
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0 scale-95"
                    enter-to="opacity-100 scale-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100 scale-100"
                    leave-to="opacity-0 scale-95"
                >
                    <DialogPanel
                    class="w-full max-w-md transform overflow-hidden rounded bg-white p-6 text-left align-middle shadow-xl transition-all"
                    >
                    <DialogTitle
                        as="h3"
                        class="text-lg font-medium leading-6 text-gray-900"
                    >
                        Add Category
                    </DialogTitle>
                    <div class="mt-4">
                        <div>
                            <label class="input-label">Category Name</label>
                            <input v-model="categoryName" class="form-control" type="text" placeholder="Field Name"/>
                        </div>
                    </div>

                    

                    <div class="mt-7">
                        <button
                        type="button"
                        class="inline-flex justify-center rounded border border-transparent bg-gray-200 px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                        @click="closeModal"
                        >
                            Cancel
                        </button>

                        <button
                        type="button"
                        class="inline-flex ml-2 justify-center rounded border border-transparent text-white bg-blue-500 px-4 py-2 text-sm font-medium hover:bg-blue-600 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                            @click="HangdelCategoryName"
                        >
                            Submit
                        </button>
                    </div>
                    </DialogPanel>
                </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>

</template>


<script>
    import {  ChevronUpIcon } from '@heroicons/vue/24/solid';
    import AdminLayout from './AdminLayout.vue';
    import { Disclosure, DisclosureButton, DisclosurePanel, TransitionRoot,
             TransitionChild, Dialog,
                DialogPanel,
                DialogTitle} from '@headlessui/vue';
    import { Switch } from '@headlessui/vue';
    import { BASE_URL } from "../../config";
    import axios from "axios";
    import { createLocal } from 'the-storages';
    import { createToast } from 'mosha-vue-toastify';
    import { reactive } from "vue";
    // import Multiselect from 'vue-multiselect';


    const mirror = createLocal();
    const storage = mirror._prx;



    export default {
        name: 'AddEmployeeMaster',
        components:{
            AdminLayout,
            Disclosure, DisclosureButton, DisclosurePanel,
            ChevronUpIcon, Switch, TransitionChild, TransitionRoot,
            Dialog,
            DialogPanel,
            DialogTitle,
            // Multiselect
        },
        setup() {
          const addfield = reactive({
              field_name: '',
              field_type: '',
              field_status: '',
          })
          return {
                addfield,

            }
        },

        data() {
            return {
                
                enabled: false,
                isModalOpen: false,
                isCategoryModalOpen: false,
                categoryName: '',
                storage:storage,
                categoryforfieldadd:'',
                editrow: false,
                itemtobeedited:{},
                categorytobeedited:'',
                categoryfordeletingfield:'',
                fieldtobedeleted:'',
                res_message:'',
                selectedOptions: [],
                availableOptions: [],

                InformationData:[
                    {name:"Personal Information", categorystatus: true, items:[
                        {name:'First Name', type:'text', mandatory:'Yes', status:true},
                        {name:'Last Name', type:'text', mandatory:'Yes', status:true},
                        {name:'Gender', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Date of Birth', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Nationality', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Marital Status', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Email', type:'text', mandatory:'Yes', status:true},
                        {name:'Phone', type:'numeric', mandatory:'Yes', status:true},
                    ]},
                    {name:"Employment Information", categorystatus: true, items:[
                        {name:'Employee ID', type:'text', mandatory:'Yes', status:true},
                        {name:'Job Title/Position', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Department/Division', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Date of Joining', type:'datepicker', mandatory:'Yes', status:true},
                        // {name:'Employment Status', type:'dropdown', mandatory:'Yes', status:true},
                        // {name:'Employment Type ', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'Supervisor/Manager Name', type:'dropdown', mandatory:'Yes', status:true},
                    ]},
                    {name:"Compensation and benifits", categorystatus: true, items:[
                        {name:'Salary/Wage', type:'numeric', mandatory:'Yes', status:true},
                        {name:'Bank Account Number', type:'text', mandatory:'Yes', status:true},
                        {name:'Pan Number', type:'text', mandatory:'Yes', status:true},
                        {name:'Benifit Related Documents', type:'file', mandatory:'Yes', status:true}
                    ]},
                    {name:"Academics Details", categorystatus: true, items:[
                        {name:'Highest Education Level', type:'dropdown', mandatory:'Yes', status:true},
                        {name:'School/Institution Name', type:'text', mandatory:'Yes', status:true},
                        {name:'Degree/Certificate Obtained', type:'dropdown', mandatory:'Yes', status:true},
                    ]},
                    {name:"Work Experience", categorystatus: true, items:[
                        {name: 'Previous Employers ', type:'text', mandatory:'Yes', status:true},
                        {name:'Relevant Skills', type:'tag', mandatory:'Yes', status:true},
                        {name:'Upload Certificates', type:'file', mandatory:'Yes', status:true},
                        {name:'Relevant Work Experience', type:'text', mandatory:'Yes', status:true}
                    ]},
                    {name:"Document Uploads", categorystatus: true, items:[
                        {name:'Resume/CV', type:'file', mandatory:'Yes', status:true},
                        {name:'Identification Documents', type:'file', mandatory:'Yes', status:true},

                    ]},
                    
                    
                ],

                infoarray:[],
                toggledata:''
                
            }
        },
        computed:{
            
        },

        async created(){
            await axios.post(BASE_URL + '/fetchemployeemasterdetails',{'company_id':this.storage.company_id})
                    .then((response)=>{
                        console.log(response.data);
                        if (response.data.formdetails != false) {
                            this.InformationData = response.data.formdetails
                        }
                        console.log(this.InformationData);
                    })
        },

        methods:{
            closeModal(){
                this.isModalOpen = false;
                this.isCategoryModalOpen = false;
            },
            ModalOpen(name) {
                this.isModalOpen = true;
                this.categoryforfieldadd = name;
                // console.log("gfddgj",name);
                // console.log("gfddgj",this.addfield.field_type);

                // console.log("sdfghjk",this.InformationData);


            },

            addfieldmodal(){

                for (var i = 0; i < this.InformationData.length; i++) {
                    if (this.InformationData[i].name === this.categoryforfieldadd) {
                        this.InformationData[i].items.push({name:this.addfield.field_name, type:this.addfield.field_type, mandatory:this.addfield.field_status, status:true});
                    }
                }
                this.isModalOpen = false;
                this.res_message = 'field '.concat(this.addfield.field_name).concat(" added.")
                this.onSubmit();

            },

            editfield(item, name){
                // console.log("item",name);
                this.categorytobeedited = name;
                this.itemtobeedited = item;
                this.isModalOpen = true;
                this.editrow = true;
                this.addfield.field_name = item.name;
                this.addfield.field_type = item.type;
                this.addfield.field_status = item.mandatory;
            },

            editfieldmodal(){

                for (var i = 0; i < this.InformationData.length; i++) {
                    if (this.InformationData[i].name == this.categorytobeedited) {
                        
                        for (var j = 0; j < this.InformationData[i].items.length; j++) {
                            if (this.InformationData[i].items[j] == this.itemtobeedited) {

                                this.InformationData[i].items[j].name = this.addfield.field_name;
                                this.InformationData[i].items[j].type = this.addfield.field_type;
                                this.InformationData[i].items[j].mandatory = this.addfield.field_status;
                                this.InformationData[i].items[j].status = true;
                            }
                        }
                    }
                }

                this.editrow = false;
                this.isModalOpen = false;

                this.res_message = 'field '.concat(this.addfield.field_name).concat(" edited.")
                this.onSubmit();


            },

            deletefield(name,item){

                this.categoryfordeletingfield = item;
                this.fieldtobedeleted = name;

                // console.log(this.categoryfordeletingfield);
                // console.log(this.fieldtobedeleted);
                
                for (var i = 0; i < this.InformationData.length; i++) {
                    if (this.InformationData[i].name == this.categoryfordeletingfield) {
                        
                        for (var j = 0; j < this.InformationData[i].items.length; j++) {
                            if (this.InformationData[i].items[j] == this.fieldtobedeleted) {
                                this.InformationData[i].items.splice(j, 1);
                            }
                        }
                    }
                }

                this.res_message = 'field '.concat(this.fieldtobedeleted.name).concat(" deleted.")
                this.onSubmit();

            },

            HandelCategoryModal(){
                this.isCategoryModalOpen = true;
            },

            HangdelCategoryName(){
                this.InformationData.push({name:this.categoryName, items:[]});
                this.isCategoryModalOpen = false;

                
                this.res_message = 'category '.concat(this.categoryName).concat(" added.")
                this.onSubmit();
            },
            activestatus(status, name){
                // console.log("status",status);
                // console.log("name",name);
                if (status == true) {

                    this.res_message = 'field '.concat(name).concat(" deactivated.")

                    
                } else {
                    
                    this.res_message = 'field '.concat(name).concat(" activated.")

                    
                }
                setTimeout(() => {
                    this.onSubmit();

                  },1000);

                console.log("toggledata",this.InformationData);
            },

            activecategorystatus(status, name){
                // console.log("status",status);
                // console.log("name",name);
                if (status == true) {

                    this.res_message = 'category '.concat(name).concat(" deactivated.")
                    
                } else {
                    
                    this.res_message = 'category '.concat(name).concat(" activated.")
                    
                }
                this.onSubmit();
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
            async onSubmit(){
                console.log("payloadinfo",this.InformationData);
                // this.infoarray = this.InformationData;
                var dataval = {
                                'info':this.InformationData,
                                'company_id':this.storage.company_id,
                                'message':this.res_message
                            }
                console.log("payloadinfo3",dataval);

                await axios.post(BASE_URL + '/addemployeemasterdetails',dataval)
                    .then((response)=>{
                        console.log(response.data);
                        this.tostMessage(response.data.success, response.data.message);

                    })

                    console.log("payloadinfo2",this.InformationData);
                
                
            },

            addCustomOption(newTag) {
                // Add the new tag to the available options
                this.availableOptions.push(newTag);
                // Add the new tag to the selected options
                this.selectedOptions.push(newTag);
            },
        }
        

    }


</script>