<template>
    <AdminLayout>
        <section class="grid grid-cols-7">
            <div class="col-span-7 py-2 px-10">
            <!-- <form class=" pt-10" > -->
            <div class=" pt-10" >


                <div class="max-w-5xl">
                    <Disclosure >
                        <div class="flex justify-between w-full items-center pr-4">

                            

                            <!-- <button v-if="open" class="py-1 text-neutral-600 hover:text-red-500 transition-all bg-white px-2 rounded border ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button> -->

                            <!-- <DisclosureButton class="py-1 text-neutral-600 hover:text-red-500 transition-all bg-white px-1.5 rounded border ml-2">
                                
                                <ChevronUpIcon
                                    :class="open ? 'rotate-180 transform' : ''"
                                    class="h-5 w-5 text-gray-500 transition-all"
                                />
                            </DisclosureButton> -->
                        </div>

                        <!-- Use the built-in `transition` component to add transitions. -->
                       
                        <!-- <transition
                        
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-out"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        > -->
                           
                            <!-- <DisclosurePanel  > -->
                                <div class=" overflow-x-auto sm:rounded-lg p-5">
                                    <div class="bg-white p-4">
                                        <table class="w-full text-sm text-left text-neutral-500 ">
                                            <thead class="text-xs text-neutral-700 border-b uppercase border-b-neutral-800 ">
                                                <tr>
                                                    <th scope="col" class="pr-6 py-3 font-semibold">
                                                        Emp Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Emp Code
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Job Role
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Department
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Edit
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 font-semibold">
                                                        Active/Inactive
                                                    </th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr v-for="(item, index) in empdata" :key="index" class="bg-white border-b text-base">
                                                    <td scope="row" class="pr-6 py-4 font-medium text-neutral-700 whitespace-nowrap">
                                                        {{ item.fname }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ item.empid }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ item.email }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ item.jobtitle }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{ item.dept }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        <div class="flex">
                                                            
                                                            <router-link :to="`/editemployee/${item._id}`" class="edtl" >
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </router-link>

                                                        </div>
                                                    </td>

                                                    
                                                    <td class="px-6 py-4">
                                                        <div class="flex">

                                                            <Switch
                                                                v-model="item.status" @click="activestatus(item.status, item._id)"
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
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                
                                            
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            <!-- </DisclosurePanel> -->
                        
                        <!-- </transition> -->
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

</template>


<script>
    // import {  ChevronUpIcon } from '@heroicons/vue/24/solid';
    import AdminLayout from './AdminLayout.vue';
    import {    Disclosure,
            //  DisclosureButton,  
            //  DisclosurePanel,
            //  TransitionRoot,
                // TransitionChild,
                // Dialog,
                // DialogPanel,
                // DialogTitle
            } from '@headlessui/vue';
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
        name: 'EmployeeList',
        components:{
            AdminLayout,
            Disclosure, 
            // DisclosureButton,
            // DisclosurePanel,
            // ChevronUpIcon, 
            Switch,
            // TransitionChild,
            // TransitionRoot,
            // Dialog,
            // DialogPanel,
            // DialogTitle,
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

                empdata:'',

                infoarray:[],
                toggledata:''
                
            }
        },
        computed:{
            
        },

        async created(){
            await axios.post(BASE_URL + '/fetchaddedemployeedetails',{
                                'company_id':this.storage.company_id,
                            })
                    .then((response)=>{
                        console.log(response.data);
                        this.empdata = response.data.empdata

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
            
            async activestatus(status, id){
                console.log(status, id);
                if (status == true) {
                    status = false;
                } else {
                    status = true;
                    
                }
                var dataval = {
                                'status':status,
                                'company_id':this.storage.company_id,
                                'emp_id':id
                            }

                await axios.post(BASE_URL + '/updatempstatus',dataval)
                    .then((response)=>{
                        // console.log(response.data);
                        this.tostMessage(response.data.success, response.data.message);
                        this.empdata = response.data.empdata
                    })

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