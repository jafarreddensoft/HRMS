<template>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="CloseModal" class="relative z-10">
        <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
        >
            <div class="fixed inset-0 backdrop-blur-sm bg-black/30"></div>
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
                class="w-full max-w-7xl transform overflow-hidden rounded bg-white p-6 text-left align-middle shadow-xl transition-all"
                >
                <DialogTitle as="h3" class="text-2xl font-semibold leading-6 text-neutral-700 flex items-center">
                    <span class="bg-neutral-100 rounded p-2 text-neutral-600 inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </span>
                    <span class="pl-3">Settings</span>
                </DialogTitle>
               
                
                <div class="grid grid-cols-7 mt-10">
                    <TabGroup :selectedIndex="currntStep" @change="ChangeTab">
                        <TabList class="col-span-2 border-r">
                            <Tab
                                v-for="(steps, id) in Object.values(categories)"
                                as="template"
                                :key="id"
                                v-slot="{ selected }"
                                
                                >
                                <div class="tab-menu" :class="{active: selected}">
                                    <p>
                                        {{steps.title}}
                                    </p>
                                    <div class="">
                                        {{steps.stepCount}}
                                    </div>
                                    <span class="">
                                        {{steps.status}}
                                    </span>
                                </div>
                            </Tab>
                                
                        </TabList>

                        <TabPanels class="col-span-5 pl-7">
                            <TabPanel
                                v-for="(stepsDetails, id) in Object.values(categories)"
                                :key="id"
                            >
                                <p class="text-sm text-neutral-400 font-semibold">Step {{stepsDetails.stepCount}}</p>

                                <p class="text-2xl text-neutral-900 font-semibold pt-5">
                                    {{stepsDetails.title}}
                                </p>
                                <p class="text-sm text-neutral-500 pt-2 pb-4">
                                    {{stepsDetails.description}}
                                </p>

                                <div> 
                                    <OrganizationSetting @callback="HandleCallback" @callbackProceed="HandelcallbackProceed"  v-if="stepsDetails.stepCount === 1"/>
                                    <AttendanceSetting @callback="HandleCallback" @callbackProceed="HandelcallbackProceed" v-else-if="stepsDetails.stepCount === 2"/>
                                    <LeaveSettings @callback="HandleCallback" @callbackProceed="HandelcallbackProceed" v-else-if="stepsDetails.stepCount === 3"/>
                                    <DepartmentSetting  @callback="HandleCallback" @callbackProceed="HandelcallbackProceed" v-else-if="stepsDetails.stepCount === 4"/>
                                    <DesignationsSetting @callback="HandleCallback" @callbackProceed="HandelcallbackProceed" v-else-if="stepsDetails.stepCount === 5" />
                                </div>

                               
                            </TabPanel>
                        </TabPanels>

                    </TabGroup>
                </div>

                </DialogPanel>
            </TransitionChild>
            </div>
        </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>

    import { ref } from 'vue';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle, TabGroup, TabList, Tab, TabPanels, TabPanel} from '@headlessui/vue';
    import OrganizationSetting from "./OrganizationSetting.vue";
    import AttendanceSetting from "./AttendanceSetting.vue";
    import LeaveSettings from "./LeaveSettings.vue";
    import DepartmentSetting from "./DepartmentSetting.vue";
    import DesignationsSetting from "./DesignationsSetting.vue";


    export default {
        name: 'AdminSettingModal',

        components:{
            OrganizationSetting,
            TransitionRoot, 
            TransitionChild, 
            Dialog, 
            DialogPanel, 
            DialogTitle,
            TabGroup,
            TabList, 
            Tab,
            TabPanels,
            TabPanel,
            AttendanceSetting,
            LeaveSettings,
            DepartmentSetting,
            DesignationsSetting,
        },

        data() {
            return {
                isOpen: ref(true),
                currntStep: 0,
                categories : [
                    {
                        id: 1,
                        title: 'Organization Setting',
                        description: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
                        status:'pending',
                        stepCount: 1,
                    },
                    {
                        id: 2,
                        title: 'Attendance Setting',
                        description: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
                        status:'pending',
                        stepCount: 2,
                    },
                    {
                        id: 3,
                        title: 'Leave Management',
                        description: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
                        status:'pending',
                        stepCount: 3,
                    },
                    {
                        id: 4,
                        title: 'Department Setting',
                        description: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
                        status:'pending',
                        stepCount: 4,
                    },
                    {
                        id: 5,
                        title: 'Designations Setting',
                        description: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
                        status:'pending',
                        stepCount: 5,
                    }
                ]
                    
                    
                
            }
        },
        methods:{
            CloseModal() {
                this.isOpen = false;
            },

            HandleCallback(val){
                this.isOpen = val;
            },

            ChangeTab(val){
                this.currntStep =  val;
            },

            HandelcallbackProceed(val){
                this.currntStep =  this.currntStep + val
            }

        }

    }
</script>


<style>
    .tab-menu{
        @apply relative flex items-center py-14 before:absolute before:top-2 before:left-[168px] before:bottom-2 before:w-[1px] before:bg-neutral-200
        after:absolute after:left-[164px] after:bottom-2 after:w-2.5 after:h-2.5 after:rounded-full after:bg-neutral-200 outline-none cursor-pointer;
    }
    
    .tab-menu:first-child{
        @apply pt-0;
    }
    .tab-menu div{
        @apply w-12 transition-all h-12 border-4 border-white relative z-10 rounded-full bg-neutral-200 font-semibold text-xl flex items-center justify-center;
    }
    .tab-menu p{
        @apply text-right text-neutral-500 px-5 text-base w-36;
    }
    .tab-menu span{
        @apply bg-neutral-100 rounded text-neutral-600 text-xs px-2 py-1 ml-3 capitalize;
    }

    .tab-menu.active div{
        @apply bg-blue-500 text-white;
    }
    .tab-menu.active span{
        @apply text-blue-500 bg-blue-50;
    }
    .tab-menu.active p{
        @apply text-neutral-800;
    }


</style>
