<template>
    <form v-on:submit.prevent="submitForm" class="">
        <div class="grid grid-cols-2 py-5 gap-7">
            <div class="col-span-2">
                <label class="input-label">Choose Shift Type <span class="text-red-500">*</span></label>
                <div class="flex">
                    <div class="radio-box">
                        <input type="radio" name="shiftTupe" id="general" value="General" v-model="shiftType" />
                        <label for="general" class="radio-label">General</label>
                    </div>

                    <div class="ml-4 radio-box">
                        <input type="radio" name="shiftTupe" id="maunal" value="Maunal" v-model="shiftType" />
                        <label for="maunal" class="radio-label">Maunal</label>
                    </div>
                </div>
                
            </div>

            <div v-if="shiftType == 'General'" class="col-span-2">

                <div class="grid grid-cols-2 py-5 gap-7">
                    
                    <div>
                        <label class="input-label">Effective From <span class="text-red-500">*</span></label>
                        <!-- <input class="form-control" type="text" placeholder="Select started date"/> -->
                        <datepicker  v-model="picked" />        


                    </div>

                    <div>
                        <label class="input-label">Effective To</label>
                        <!-- <input class="form-control" type="text" placeholder="Select started date"/> -->
                        <datepicker  v-model="pickedend" />        

                    </div>

                    <div>
                        <label class="text-sm text-neutral-700 font-medium  pb-2 block">Define Full Day Shift Hours</label>
                        <div class="grid grid-cols-2 gap-7">
                            <!-- <div>
                                <label class="input-label">From</label>
                                <input class="form-control" type="text" placeholder="Select start hours"/>
                            </div>     -->
                            <div class="time-preview">
                            <!-- <div class="time-preview-time">
                                {{ timeData.hh }}: {{ timeData.mm }}
                                {{ timeData.a }}
                            </div> -->
                            </div>
                            <VueTimePicker placeholder="Select start hours" v-model="timeData" ></VueTimePicker>


                            <div>
                                <!-- <label class="input-label"> To</label>
                                <input class="form-control" type="text" placeholder="Select end hours"/> -->
                                <div class="time-preview">
                                    <!-- <div class="time-preview-time">
                                        {{ timeData.hh }}: {{ timeData.mm }}
                                        {{ timeData.a }}
                                    </div> -->
                                </div>
                                <VueTimePicker placeholder="Select end hours" v-model="endtimeData" ></VueTimePicker>
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <label class="text-sm text-neutral-700 font-medium pb-2 block">Define Half Day Shift Hours</label>
                        <div class="grid grid-cols-2 gap-7">
                            <div>
                                <label class="input-label">From</label>
                                <input class="form-control" type="text" placeholder="Select start hours"/>
                            </div>

                            <div>
                                <label class="input-label ">To</label>
                                <input class="form-control" type="text" placeholder="Select end hours"/>
                            </div>
                        </div>
                        
                    </div>
                        
                        
                    
                </div>

            </div>


            <div class="col-span-2" v-if="shiftType == 'Maunal'">

                <p class="pt-5 mt-4 text-base font-semibold border-t text-neutral-700 border-neutral-100">Add New Shift</p>

                <div class="grid items-end grid-cols-9 gap-3" v-for="(field, index) in addNewShift" :key="index">
                    <div class="col-span-4 pt-4">
                        <label class="input-label">Shift Name <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" placeholder="" v-model="field.shiftName"/>
                    </div>

                    <div class="col-span-2 pt-4">
                        <label class="input-label">From <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" placeholder="" v-model="field.from"/>
                    </div>

                    <div class="col-span-2 pt-4">
                        <label class="input-label"> To <span class="text-red-500">*</span></label>
                        <div class="flex">
                            <input class="form-control" type="text" placeholder="" v-model="field.to"/>

                            

                            
                        </div>
                    </div>
                    <div class="col-span-1">
                                <button v-if="addNewShift.length > 1" type="button" class="inline-block p-3 text-red-500 border border-red-200 rounded bg-red-50" @click="removeField(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>

                  
                </div>
                <button type="button" class="px-5 mt-5 py-2 text-sm font-semibold text-blue-500 rounded bg-blue-50" @click="addField">
                    Add More
                </button>
            </div>

            


            <div class="pt-4" v-if="shiftType">
                <label class="input-label">Do working days vary weekly? <span class="text-red-500">*</span></label>
                <div class="flex pt-2">
                    <div class="radio-group">
                        <input type="radio" name="workingWeek" id="yes" value="yes" v-model="everyWeek" />
                        <label for="yes" class="radio-label">Yes</label>
                    </div>

                    <div class="ml-8 radio-group">
                        <input type="radio" name="workingWeek" id="no" value="no" v-model="everyWeek" />
                        <label for="no" class="radio-label">No</label>
                    </div>
                </div>
            </div>


            <div class="col-span-2" v-if="everyWeek">
                <label class="block pb-2 text-base text-neutral-900">Specify the working days <span class="text-red-500">*</span></label>

                <div class="flex items-center py-1 text-xs font-medium rounded bg-neutral-50 text-neutral-500">
                    <p class="w-24 pl-3 pt-1 pb-2">Week Name:</p>
                    
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Sunday</p>
                    </div>
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Monday</p>
                    </div>
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Tuesday</p>
                    </div>
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Wednesday</p>
                    </div>
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Thursday</p>
                    </div>
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Friday</p>
                    </div>
                    <div class="min-w-[85px] pt-1 pb-2 ml-4">
                        <p class="text-center">Saturday</p>
                    </div>
                </div>
                

                <div v-if="everyWeek === 'yes'">
                    <div class="flex items-center  pt-4" v-for="items in specifyDate" :key="items.id">
                        <p class="w-24 pl-3 text-sm font-semibold text-neutral-700">{{items.weekName}}</p>
                        
                        <div v-for="item in items.days" :key="item.id" class="w-[85px] ml-4" >
                            
                            <select class="shift-control-select" v-model="selectedDateWeekdays[item.val,item.name]">
                                <option>Full Day</option>
                                <option>Half Day</option>
                                <option>Non-Working</option>
                            </select>
                            
                        </div>
                        
                    </div>

                    <div class="grid grid-cols-3 py-5 gap-7 border-t mt-5">
                        <div>
                            <label class="input-label">Attendance Roster</label>
                            <input class="form-control" type="text" placeholder="Select to date"/>
                        </div>
                        <div>
                            <label class="input-label">Attendance Roster</label>
                            <input class="form-control" type="text" placeholder="Select to date"/>
                        </div>
                        <div>
                            <label class="input-label">Attendance Roster</label>
                            <input class="form-control" type="text" placeholder="Select to date"/>
                        </div>
                    </div>

                </div>

                <div v-if="everyWeek === 'no'">
                    <div class="flex items-center pt-4 pb-2" v-for="items in allDate" :key="items.id">
                        <p class="w-24 pl-3 text-sm font-semibold text-neutral-700">{{items.weekName}}</p>
                        
                        <div v-for="item in items.days" :key="item.id" class="w-[85px] ml-4">
                            <!-- <p class="text-xs font-medium text-center">{{ item.name }}</p> -->
                            <select class="shift-control-select" v-model="selectedNonVaryingWeekdays[item.val,item.name]">
                                <option>Full Day</option>
                                <option>Half Day</option>
                                <option>Non-Working</option>
                            </select>
    
                            
                        </div>
                        
                    </div>

                </div>
                

                <div>
                    <button 
                        type="button" 
                        class="ml-auto mr-2 btn-primary-light"
                        @click="closeModal"
                    >
                        Save
                    </button>

                    <button 
                        type="button"
                        class="btn-primary"
                        @click="closeModalProceed"
                    >
                        Save & Add New
                    </button>
                </div>
            </div>

            

        </div>

        <div class="flex justify-between pt-8 border-t">
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
    import { reactive } from "vue"
    // import { BASE_URL } from "../config";
    // import axios from "axios";
    // import DatePickerDate from './DatePickerDate.vue';
    import Datepicker from 'vue3-datepicker';
    import VueTimePicker from "vue3-timepicker";
    import "vue3-timepicker/dist/VueTimepicker.css";

   
    export default {
        name: 'AttendanceSetting',
        components:{
            // DatePickerDate,
            Datepicker,
            VueTimePicker,
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
              day:''
          })
    
        //   const rules3 = computed(() => {
        //       return {
        //           uname: { required },
        //           orgname: { required },
        //           email: { required, email },
        //           phone: { required, minLength: minLength(10), maxLength: maxLength(12) },
        //           country:{ required },
        //           timezone:{ required },
        //           dateformat:{ required },

        //       }
        //   })
        //   const v3$ = useValidate(rules3, state3)
    
          return {
              state3,
            //   v3$
          }
      },


        data() {
            return {
                shiftType: '',
                abc: 'Select Start Date',
                everyWeek: '',
                specifyDate: [
                    {
                       id: 1,
                       weekName: 'Week1',
                       days: [
                        {id:1, name: 'Sunday1', val: 'full', week: ''},
                        {id:2, name: 'Monday1', val: 'full',  week: 'week1'},
                        {id:3, name: 'Tuesday1', val: 'full', week: 'Week1'},
                        {id:4, name: 'Wednesday1', val: 'full', week: 'Week1'},
                        {id:5, name: 'Thursday1', val: 'full',  week: 'Week1'},
                        {id:6, name: 'Friday1', val: 'full', week: 'Week1'},
                        {id:7, name: 'Saturday1', val: 'full', week: 'Week1'},
                        // {id:8, name: 'Sunday', val: 'full', week: 'Week2'},
                        // {id:9, name: 'Monday', val: 'full',  week: 'Week2'},
                        // {id:10, name: 'Tuesday', val: 'full', week: 'Week2'},
                        // {id:11, name: 'Wednesday', val: 'full', week: 'Week2'},
                        // {id:12, name: 'Thursday', val: 'full',  week: 'Week2'},
                        // {id:13, name: 'Friday', val: 'full', week: 'Week2'},
                        // {id:14, name: 'Saturday', val: 'full', week: 'Week2'},
                        // {id:15, name: 'Sunday', val: 'full', week: 'Week3'},
                        // {id:16, name: 'Monday', val: 'full',  week: 'Week3'},
                        // {id:17, name: 'Tuesday', val: 'full', week: 'Week3'},
                        // {id:18, name: 'Wednesday', val: 'full', week: 'Week3'},
                        // {id:19, name: 'Thursday', val: 'full',  week: 'Week3'},
                        // {id:20, name: 'Friday', val: 'full', week: 'Week3'},
                        // {id:21, name: 'Saturday', val: 'full', week: 'Week3'},
                        // {id:22, name: 'Sunday', val: 'full', week: 'Week4'},
                        // {id:23, name: 'Monday', val: 'full',  week: 'Week4'},
                        // {id:24, name: 'Tuesday', val: 'full', week: 'Week4'},
                        // {id:25, name: 'Wednesday', val: 'full', week: 'Week4'},
                        // {id:26, name: 'Thursday', val: 'full',  week: 'Week4'},
                        // {id:27, name: 'Friday', val: 'full', week: 'Week4'},
                        // {id:28, name: 'Saturday', val: 'full', week: 'Week4'},
                        // {id:29, name: 'Sunday', val: 'full', week: 'Week5'},
                        // {id:30, name: 'Monday', val: 'full',  week: 'Week5'},
                        // {id:31, name: 'Tuesday', val: 'full', week: 'Week5'},
                        // {id:32, name: 'Wednesday', val: 'full', week: 'Week5'},
                        // {id:33, name: 'Thursday', val: 'full',  week: 'Week5'},
                        // {id:34, name: 'Friday', val: 'full', week: 'Week5'},
                        // {id:35, name: 'Saturday', val: 'full', week: 'Week5'},
                       ]
                    },
                    {
                       id: 2,
                       weekName: 'Week2',
                       days: [
                        {id:1, name: 'Sunday2', val: 'full', week: 'Week2'},
                        {id:2, name: 'Monday2', val: 'full', week: 'Week2'},
                        {id:3, name: 'Tuesday2', val: 'full', week: 'Week2'},
                        {id:4, name: 'Wednesday2', val: 'full', week: 'Week2'},
                        {id:5, name: 'Thursday2', val: 'full', week: 'Week2'},
                        {id:6, name: 'Friday2', val: 'full', week: 'Week2'},
                        {id:7, name: 'Saturday2', val: 'full', week: 'Week2'}
                       ]
                    },
                    {
                       id: 3,
                       weekName: 'Week3',
                       days: [
                        {id:1, name: 'Sunday3', val: 'full', week: 'Week3'},
                        {id:2, name: 'Monday3', val: 'full', week: 'Week3'},
                        {id:3, name: 'Tuesday3', val: 'full', week: 'Week3'},
                        {id:4, name: 'Wednesday3', val: 'full', week: 'Week3'},
                        {id:5, name: 'Thursday3', val: 'full', week: 'Week3'},
                        {id:6, name: 'Friday3', val: 'full', week: 'Week3'},
                        {id:7, name: 'Saturday3', val: 'full', week: 'Week3'}
                       ]
                    },
                    {
                       id: 4,
                       weekName: 'Week4',
                       days: [
                        {id:1, name: 'Sunday4', val: 'full', week: 'Week4'},
                        {id:2, name: 'Monday4', val: 'full', week: 'Week4'},
                        {id:3, name: 'Tuesday4', val: 'full', week: 'Week4'},
                        {id:4, name: 'Wednesday4', val: 'full', week: 'Week4'},
                        {id:5, name: 'Thursday4', val: 'full', week: 'Week4'},
                        {id:6, name: 'Friday4', val: 'full', week: 'Week4'},
                        {id:7, name: 'Saturday4', val: 'full', week: 'Week4'}
                       ]
                    },
                    {
                       id: 5,
                       weekName: 'Week5',
                       days: [
                        {id:1, name: 'Sunday5', val: 'full', week: 'Week5'},
                        {id:2, name: 'Monday5', val: 'full', week: 'Week5'},
                        {id:3, name: 'Tuesday5', val: 'full', week: 'Week5'},
                        {id:4, name: 'Wednesday5', val: 'full', week: 'Week5'},
                        {id:5, name: 'Thursday5', val: 'full', week: 'Week5'},
                        {id:6, name: 'Friday5', val: 'full', week: 'Week5'},
                        {id:7, name: 'Saturday5', val: 'full', week: 'Week5'}
                       ]
                    },
                    
                ],

                allDate: [
                    {
                       id: 1,
                       weekName: 'All Week',
                       days: [
                        {id:1, name: 'Sunday', val: 'full'},
                        {id:2, name: 'Monday', val: 'full'},
                        {id:3, name: 'Tuesday', val: 'full'},
                        {id:4, name: 'Wednesday', val: 'full'},
                        {id:5, name: 'Thursday', val: 'full'},
                        {id:6, name: 'Friday', val: 'full'},
                        {id:7, name: 'Saturday', val: 'full'}
                       ]
                    },
                ],

                addNewShift:[
                    {shiftName:"", from:"", to:""}
                ],
                picked: new Date(),
                pickedend: new Date(),
                selectedDateWeekdays: [],
                selectedNonVaryingWeekdays:[],
                timeFormat: "hh:mm A",
                timeData: {
                    hh: "00",
                    mm: "00",
                    a: "AM",
                },
                endtimeData: {
                    hh: "00",
                    mm: "00",
                    a: "AM", 
                }

            }
        },

        async created(){
            console.log("test",this.shiftType);
        },

        methods:{

            HandelCurrentDate(val){
                this.picked = val;
                console.log("dbjvudk",val);
            },
            
            closeModal() {
                this.$emit('callback', false)
            },

            closeModalProceed(){
                // console.log(this.specifyDate)
                this.$emit('callbackProceed', 1)
            },

            addField() {
                this.addNewShift.push({shiftName:"", from:"", to:""}); 
            },
            removeField(index) {
                this.addNewShift.splice(index, 1); 
            },

            submitForm(){
                console.log("test",this.shiftType);
                console.log("date",this.picked);
                console.log("date",this.pickedend);
                console.log("day",this.selectedDateWeekdays);
                console.log("nonvaryingday",this.selectedNonVaryingWeekdays);

            },
            
        
        },

        watch:{
            // async picked(){
            //     console.log("date",this.picked);
                
            // },
        },


        

    }
</script>

<style>
    .shift-control-select{
        @apply w-full text-xs border rounded px-1.5 text-neutral-500 py-1 outline-0 focus:border-blue-500;
    }
    .radio-box input{
        @apply hidden;
    }
    .radio-box .radio-label{
        @apply rounded border py-4 px-5 w-48 flex items-center text-neutral-600 before:w-5 before:h-5 before:rounded-full before:border before:mr-4
                before:border-neutral-300 transition-all before:transition-all before:content-['\00B7'] before:text-transparent before:text-8xl before:leading-3 before:flex before:items-center;
    }

    .radio-box input[type=radio]:checked + .radio-label{
        @apply bg-blue-50 border-blue-200 text-blue-600 before:border-blue-50 before:border-4 before:bg-blue-600 before:border-spacing-4 before:outline before:outline-1 before:outline-blue-600;
    }

    .time-preview {
  border: 1px solid #eee;
  max-width: 400px;
  text-align: center;
  margin: 0 auto;
  margin-bottom: 20px;
  padding: 15px;
  background: rgb(70, 25, 173);
  color: #fff;
}

.time-preview-time {
  font-size: 30px;
}

</style>