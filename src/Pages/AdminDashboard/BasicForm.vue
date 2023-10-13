<template>
    <AdminLayout>
        <section class="grid grid-cols-7">
            <div class="col-span-7 py-2 px-10">
                <div class="flex justify-between items-end pb-12 pt-14">
                    <div>
                        <h2 class="text-2xl font-semibold text-neutral-900">Hi, Admin</h2>
                        <p class="text-neutral-500 pt-2">Today is {{ formattedDate }}</p>
                    </div>
                    <div class="flex">
                        <div class="w-48">
                            <DropDown :options="shiftName" :message="`Select Option`" v-model="selectedShift" />
                        </div>
                        <div class="w-48 ml-3">
                            <DatePickerDate v-model="selectedDate" />
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <div class="border rounded-lg py-7 px-8">
                        <div class="flex justify-between">
                            <form v-on:submit.prevent="submitForm" ref="form" name="form">
                                <div class="grid grid-cols-7 gap-7 py-5">
                                    <div class="">
                                        <label class="input-label">Basic <span class="text-red-500">*</span></label>
                                        <input class="form-control" type="number" min="0"  v-model="state3.basic" placeholder="Enter basic %"/>
                                        <!-- <span v-if="v3$.uname.$error" class="error">
                                            {{ v4$.leaveName.$errors[0].$message }}
                                        </span> -->
                                    </div>

                                    <div class="">
                                        <label class="input-label">HRA <span class="text-red-500">*</span></label>
                                        <input class="form-control" type="number" min="0" v-model="state3.hra" placeholder="Enter HRA %"/>
                                    </div>

                                    <div class="">
                                        <label class="input-label">Other Allowances <span class="text-red-500">*</span></label>
                                        <input class="form-control" type="number" min="0" v-model="state3.other" placeholder="Enter other allowances %"/>
                                    </div>

                                    <div class="">
                                        <label class="input-label">Edu Allowance <span class="text-red-500">*</span></label>
                                        <input class="form-control" type="number" min="0" v-model="state3.edu" placeholder="Enter educational allowance %"/>
                                    </div>

                                    <div class="">
                                        <label class="input-label">PF <span class="text-red-500">*</span></label>
                                        <input class="form-control" type="number" min="0" v-model="state3.pf" placeholder="Enter PF %"/>
                                    </div>

                                    <div class="">
                                        <label class="input-label">P.Tax <span class="text-red-500">*</span></label>
                                        <input class="form-control" type="number" min="0"  v-model="state3.ptaxfrom" placeholder="Enter From Salary"/>
                                        <input class="form-control" type="number" min="0"  v-model="state3.ptaxto" placeholder="Enter To Salary"/>
                                        <select class="shift-control-select"  placeholder="Enter PF type"  v-model="state3.ptaxtype">
                                                        <option>Flat</option>
                                                        <option>Percentage</option>
                                                    </select>
                                        <input class="form-control" type="number" min="0"  placeholder="Enter Amount"  v-model="state3.ptaxamount"/>
                                        <button 
                                        type="button" 
                                        class="btn-gray-light"
                                        @click="addptax"
                                        >
                                            Add
                                        </button>

                                        <div class=" overflow-x-auto sm:rounded-lg pt-5">
                                                    <table class="w-full text-sm text-left text-neutral-500 ">
                                                        <thead class="text-xs text-neutral-400 uppercase bg-neutral-100 ">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3 font-semibold">
                                                                    From Salary
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 font-semibold">
                                                                    To salary
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 font-semibold">
                                                                    Type
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 font-semibold">
                                                                    Amount
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 font-semibold">
                                                                    Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody v-for="(row) in ptaxdata" :key="row">
                                                            <tr>
                                                                <td class="px-6 py-4">
                                                                    {{row.fromsalary}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{row.tosalary}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{row.type}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{row.amount}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <input type='button' value='Delete' @click='deleteRecord(row._id)'>
                                                                </td>

                                                            </tr>
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
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
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="pt-4 text-right">
                            <button class=" btn-primary-light flex items-center">
                                <span class="pr-2">
                                    Show More
                                </span>
                                <span>
                                    <ChevronRightIcon class="w-3 h-3"/>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 pt-10 gap-7">
                        <div class="col-span-3 rounded-lg border p-5">
                            <div>
                                <div class="flex justify-between">
                                    <p class="font-semibold text-xl text-neutral-800">Leaves</p>
                                    
                                    <button class="inline-flex rounded border border-blue-100 bg-blue-50 p-2 text-sm text-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none transition-all w-8 h-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </button>
                                   
                                </div>

                                <div class="pt-2">
                                    <TabGroup>
                                        <TabList class="flex space-x-10 border-b">
                                            <Tab
                                                v-for="items in leavesCategories"
                                                as="template"
                                                :key="items.id"
                                                v-slot="{ selected }"
                                            >
                                            <button :class="[ 'border-b-2 py-2.5 text-sm font-medium leading-5',
                                                'focus:outline-none',
                                                selected
                                                    ? ' border-blue-600 text-blue-500'
                                                    : 'text-neutral-600 hover:bg-white/[0.12] hover:text-blue-500 border-transparent',
                                                ]"
                                            >
                                                {{ items.name }}
                                            </button>
                                            </Tab>
                                        </TabList>

                                        <TabPanels class="mt-2">
                                            <TabPanel v-for="items in leavesCategories" :key="items.id">
                                                <div class=" overflow-x-auto sm:rounded-lg">
                                                    <table class="w-full text-sm text-left text-neutral-500">

                                                        <thead class="text-xs text-neutral-500 uppercase rounded bg-neutral-100">
                                                            <tr>
                                                                <th scope="col" class="px-3 py-3 font-medium">
                                                                    Full Name
                                                                </th>
                                                                <th scope="col" class="px-3 py-3 font-medium">
                                                                    Apply
                                                                </th>
                                                                <th scope="col" class="px-3 py-3 font-medium">
                                                                    Type
                                                                </th>
                                                                <th scope="col" class="px-3 py-3 font-medium">
                                                                    Days
                                                                </th>
                                                                <th scope="col" class="px-3 py-3 font-medium">
                                                                    Action
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody class="divide-y">
                                                            <tr v-for="(item, index) in [1, 2, 3, 4]" :key="index" class=" bg-transparent">
                                                                
                                                                <td class="px-3 py-4">
                                                                    <div class="flex items-center">
                                                                        <div>
                                                                            <span class="w-10 h-10 border rounded inline-block">
                                                                                <img class="w-full h-full object-cover rounded" src="@/assets/user.png" alt=""/>
                                                                            </span>
                                                                            <!-- <span class="w-10 h-10 border rounded inline-block">
                                                                                KP
                                                                            </span> -->
                                                                        </div>
                                                                        <div class="pl-3">
                                                                            <p class=" text-neutral-800 font-medium truncate">Kuntal Patra</p>
                                                                            <p class="text-xs">Sr. Developer</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-3 py-4 truncate">
                                                                    20 Jun, 2023
                                                                </td>
                                                                <td class="px-3 py-4">
                                                                    <span class="text-orange-600">Casual</span>
                                                                </td>
                                                                <td class="px-3 py-4">
                                                                    2
                                                                </td>
                                                                <td class="px-3 py-4">
                                                                    <div class="flex">
                                                                        <button class="px-1 text-neutral-600 hover:text-blue-500 transition-all">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                            </svg>
                                                                        </button>
                                                                        <button class="px-1 text-neutral-600 hover:text-orange-500 transition-all">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                            </svg>
                                                                        </button>
                                                                        <button class="px-1 text-neutral-600 hover:text-red-500 transition-all">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </TabPanel>
                                        </TabPanels>
                                    </TabGroup>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2 rounded-lg p-5 bg-neutral-50">
                            <div class="flex justify-between">
                                <p class="font-semibold text-xl text-neutral-800">Late Mark</p>
                                
                                <button class="inline-flex rounded border border-blue-100 bg-blue-50 p-2 text-sm text-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none transition-all w-8 h-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            </div>

                            <div class="pt-3">
                                <div v-for="(item, index) in [1, 2, 3, 4, 5, 6]" :key="index" class="flex justify-between space-x-3 shadow-lg shadow-transparent hover:bg-white hover:shadow-lg hover:shadow-neutral-100 px-2 py-3 mt-1 rounded">
                                    <div class="">
                                        <div class="flex  items-center">
                                            <div class="h-10">
                                                <span class="w-10 h-10 border rounded inline-block">
                                                    <img class="w-full h-full object-cover rounded" src="@/assets/user.png" alt=""/>
                                                </span>
                                                <!-- <span class="w-10 h-10 border rounded inline-block">
                                                    KP
                                                </span> -->
                                            </div>
                                            <div class="pl-2 w-28">
                                                <p class=" text-neutral-800 font-medium text-sm truncate">Kuntal Patra</p>
                                                <p class="text-xs text-neutral-400">Sr. Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p class="text-xs text-neutral-400">Check In</p>
                                        <p class="text-sm">10:45 am</p>
                                    </div>
                                    <div class="">
                                        <p class="text-xs text-neutral-400">Late</p>
                                        <p class="text-sm truncate">1hr 45min</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <AdminSettingModal/>
    </AdminLayout>
</template>
<script>
    import AdminLayout from './AdminLayout.vue';
    import AdminSettingModal from '../../components/AdminSettingModal.vue';
    import moment from 'moment';
    import DropDown from '../../components/DropDown.vue';
    import DatePickerDate from '../../components/DatePickerDate.vue';
    import { ChevronRightIcon} from '@heroicons/vue/24/solid';
    import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
    import { reactive } from "vue";
    import { BASE_URL } from "../../config";
    import axios from "axios";

    export default {
        name: 'BasicForm',
        components:{
            AdminLayout,
            AdminSettingModal,
            DropDown,
            DatePickerDate,
            // ChevronDownIcon,
            // ArrowDownTrayIcon,
            ChevronRightIcon,
            TabGroup,
            TabList,
            Tab,
            TabPanels,
            TabPanel

        },

        setup() {
          const state3 = reactive({
              basic: '',
              hra:'',
              other: '',
              edu: '',
              pf: '',
              ptaxfrom: '',
              ptaxto:'',
              ptaxtype:'',
              ptaxamount:'',
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
            return {
                toDayDate: new Date(),
                shiftName: [ 'Morning Shift', 'Night Shift', 'Mid Shift ', 'Small Shift', 'Large Shift'],
                attendanceStatus: ['All', 'WFH', 'Leave', 'WFO'],
                selectedAttendance: 'All',
                selectedShift: 'Morning Shift',
                selectedDate: new Date(), 


                leavesCategories: [
                    {
                        id: 1,
                        name: 'Pending Leaves',
                            data: [
                                {
                                    id: 1,
                                    title: 'Does drinking coffee make you smarter?',
                                    date: '5h ago',
                                    commentCount: 5,
                                    shareCount: 2,
                                },
                                {
                                    id: 2,
                                    title: "So you've bought coffee... now what?",
                                    date: '2h ago',
                                    commentCount: 3,
                                    shareCount: 2,
                                },
                            ]
                    },
                    {
                        id: 1,
                        name: 'Upcoming leaves',
                            data: [
                                {
                                    id: 1,
                                    title: 'Does drinking coffee make you smarter?',
                                    date: '5h ago',
                                    commentCount: 5,
                                    shareCount: 2,
                                },
                                {
                                    id: 2,
                                    title: "So you've bought coffee... now what?",
                                    date: '2h ago',
                                    commentCount: 3,
                                    shareCount: 2,
                                },
                            ]
                    },
                ],

                EventCategories: [
                    {
                        id: 1,
                        name: 'Birthday',
                            data: [
                                {
                                    id: 1,
                                    title: 'Does drinking coffee make you smarter?',
                                    date: '5h ago',
                                    commentCount: 5,
                                    shareCount: 2,
                                },
                                {
                                    id: 2,
                                    title: "So you've bought coffee... now what?",
                                    date: '2h ago',
                                    commentCount: 3,
                                    shareCount: 2,
                                },
                            ]
                    },
                    {
                        id: 1,
                        name: 'Work Anniversary',
                            data: [
                                {
                                    id: 1,
                                    title: 'Does drinking coffee make you smarter?',
                                    date: '5h ago',
                                    commentCount: 5,
                                    shareCount: 2,
                                },
                                {
                                    id: 2,
                                    title: "So you've bought coffee... now what?",
                                    date: '2h ago',
                                    commentCount: 3,
                                    shareCount: 2,
                                },
                            ]
                    },
                    {
                        id: 1,
                        name: 'Holiday',
                            data: [
                                {
                                    id: 1,
                                    title: 'Does drinking coffee make you smarter?',
                                    date: '5h ago',
                                    commentCount: 5,
                                    shareCount: 2,
                                },
                                {
                                    id: 2,
                                    title: "So you've bought coffee... now what?",
                                    date: '2h ago',
                                    commentCount: 3,
                                    shareCount: 2,
                                },
                            ]
                    },
                ],

                ptaxdata:'',
                
                
            }
        },
        computed:{
            formattedDate(){
                const dateObject = new Date();
                return moment(dateObject).format('LLLL'); 
            },

        
        },

        async created(){
            this.fetchsalarydata();
        },

        methods:{
           async addptax(){
                const formData = {"fromsalary": this.state3.ptaxfrom,"tosalary": this.state3.ptaxto,"type": this.state3.ptaxtype,"amount": this.state3.ptaxamount};
                
                await axios.post(BASE_URL + '/addptax',formData)
                    .then((response)=>{
                        console.log(response.data);
                        this.ptaxdata = response.data.ptaxdetails;
                    })

            },

            async deleteRecord(id){

                await axios.post(BASE_URL + '/delptax',{'id':id})
                    .then((response)=>{
                        console.log(response.data);
                        this.ptaxdata = response.data.ptaxdetails;
                    })
            },

            async submitForm(){

                const salarydata = {"basic": this.state3.basic,"hra": this.state3.hra,
                "other": this.state3.other,
                "educational": this.state3.edu, "pf": this.state3.pf};

                console.log(this.state3.basic);

                await axios.post(BASE_URL + '/savesalaryprovision',salarydata)
                    .then((response)=>{
                        console.log(response.data);
                        // this.ptaxdata = response.data.ptaxdetails;
                    })
            },

            async fetchsalarydata(){

                axios.post(BASE_URL + '/fetchsalarydata',{'id':'1'})
                    .then((response)=>{

                        this.ptaxdata = response.data.ptaxdetails;
                        console.log("salaryprovisiondetails", response.data);
                        if (response.data.salaryProvisiondetails.length != 0) {

                            this.state3.basic = response.data.salaryProvisiondetails[0].basic;
                            this.state3.hra = response.data.salaryProvisiondetails[0].hra;
                            this.state3.other = response.data.salaryProvisiondetails[0].other;
                            this.state3.edu = response.data.salaryProvisiondetails[0].educational;
                            this.state3.pf = response.data.salaryProvisiondetails[0].pf;
                        }

                        // this.ptaxdata = response.data.ptaxdetails;
                        console.log(this.state3.basic);

                    })
            }
        }
        

    }
</script>