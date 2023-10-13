<template>
    <EmployeeLayout>
        <section class="grid grid-cols-7">
            <div class="col-span-5 py-2 px-10">
                <div class="flex justify-between items-end pb-12 pt-14">
                    <div>
                        <h2 class="text-2xl font-semibold text-neutral-900">Hi, {{ employeeName }}</h2>
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

                <div class="grid grid-cols-10 gap-8 pt-5">

                    <div class="col-span-2 bg-blue-50/70 border border-blue-100 rounded p-5 text-center">
                        <p class="text-sm font-medium text-blue-950/70">Total Employee</p>
                        <p class="text-blue-500 text-5xl font-medium pt-5">65</p>
                    </div>

                    <div class="col-span-3 bg-emerald-50/70 border border-emerald-100 rounded ">
                        <div class="grid grid-cols-2 h-full">
                            <div class="p-5">
                                <p class="text-sm font-medium text-emerald-950/70">Present</p>
                                <p class="text-emerald-500 text-5xl font-medium pt-5">50</p>
                            </div>
                            <div class="border-l border-emerald-200/70">
                                <div class="py-3 pl-4">
                                    <p class="text-xs font-medium text-emerald-950/50">WFH</p>
                                    <p class="text-emerald-500/80 text-xl font-medium pt-1">10</p>
                                </div>
                                <div class="py-3 pl-4 border-t border-emerald-200/70">
                                    <p class="text-xs font-medium text-emerald-950/50">At Office</p>
                                    <p class="text-emerald-500/80 text-xl font-medium pt-1">40</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-3 bg-yellow-50/70 border border-yellow-100 rounded ">
                        <div class="grid grid-cols-2 h-full">
                            <div class="p-5">
                                <p class="text-sm font-medium text-yellow-950/70">On Leave</p>
                                <p class="text-yellow-500 text-5xl font-medium pt-5">15</p>
                            </div>
                            <div class="border-l border-yellow-200/70">
                                <div class="py-3 pl-4">
                                    <p class="text-xs font-medium text-yellow-950/50">Casual</p>
                                    <p class="text-yellow-500/80 text-xl font-medium pt-1">10</p>
                                </div>
                                <div class="py-3 pl-4 border-t border-yellow-200/70">
                                    <p class="text-xs font-medium text-yellow-950/50">Medical</p>
                                    <p class="text-yellow-500/80 text-xl font-medium pt-1">5</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 bg-orange-50/70 border border-orange-100 rounded p-5 text-center">
                        <p class="text-sm font-medium text-orange-950/70">Absent</p>
                        <p class="text-orange-500 text-5xl font-medium pt-5">65</p>
                    </div>

                </div>


                <div class="mt-12">

                    <div class="border rounded-lg py-7 px-8">
                        <div class="flex justify-between">
                            <p class="font-semibold text-xl text-neutral-800">Attendance Status</p>
                            <div class="flex items-center">
                                <p class="text-sm">Status:</p>
                                <div class="w-28 ml-3">
                                    <DropDown :options="attendanceStatus" :message="`Select Option`" v-model="selectedAttendance" />
                                </div>
                                <button class="ml-3 btn-primary-light flex items-center">
                                    <span>
                                        <ArrowDownTrayIcon class="w-4 h-4"/>
                                    </span>
                                    <span class="pl-2">
                                        Download
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class=" overflow-x-auto sm:rounded-lg pt-5">
                            <table class="w-full text-sm text-left text-neutral-500 ">
                                <thead class="text-xs text-neutral-400 uppercase bg-neutral-100 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 font-semibold">
                                            Employer ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-semibold">
                                            Employee Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-semibold">
                                            Start
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-semibold">
                                            End
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-semibold">
                                            Hours Worked
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-semibold">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in [1, 2, 3, 4, 5]" :key="index" class="bg-white border-b">
                                        <td scope="row" class="px-6 py-4 font-medium text-neutral-700 whitespace-nowrap">
                                            #RED4516
                                        </td>
                                        <td class="px-6 py-4">
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
                                                    <p class=" text-neutral-800 font-medium">Kuntal Patra</p>
                                                    <p class="text-xs">Sr. Developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            09:21:00
                                        </td>
                                        <td class="px-6 py-4">
                                            06:21:00
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center" :class="['text-emerald-500']">
                                                <span>
                                                    <ChevronDownIcon class="w-3 h-3"/>
                                                </span>
                                                <span class="pl-1"> 
                                                    09:00:00
                                                </span>
                                            </div>
                                            
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="border rounded-3xl px-3 py-1.5 text-xs inline-block border-orange-200 bg-orange-50 text-orange-600">Automated</span>
                                            <!-- <span>Manual</span> -->
                                        </td>
                                    </tr>
                                    
                                
                                </tbody>
                            </table>
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
            <div class="col-span-2 bg-neutral-50/50 border-l py-5 px-8">
                <div>
                    <div class="flex justify-between">
                        <p class="font-medium text-lg text-neutral-800">Progress</p>
                        
                        <button class="inline-flex rounded border border-blue-100 bg-blue-50 p-2 text-sm text-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none transition-all w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="pt-2">
                        <div class="bg-white border px-4 py-3 mt-3 rounded">
                            <div class="">
                                <div class="flex justify-between items-center">
                                    <p class="text-base text-neutral-700">General Settings</p>
                                    <p class="text-sm text-blue-400 font-medium">80%</p>
                                </div>
                            </div>
                            <div class="bg-neutral-100 rounded h-1 relative mt-3">
                                <div class="w-[85%] h-1 bg-blue-400 rounded"></div>
                            </div>
                            <div class="pt-1.5">
                                <p class="text-xs text-neutral-400">20% of required general settings</p>
                            </div>
                        </div>

                        <div class="bg-white border px-4 py-3 mt-3 rounded">
                            <div class="">
                                <div class="flex justify-between items-center">
                                    <p class="text-base text-neutral-700">Attendance Settings</p>
                                    <p class="text-sm text-blue-400 font-medium">50%</p>
                                </div>
                            </div>
                            <div class="bg-neutral-100 rounded h-1 relative mt-3">
                                <div class="w-[50%] h-1 bg-blue-400 rounded"></div>
                            </div>
                            <div class="pt-1.5">
                                <p class="text-xs text-neutral-400">50% of required general settings</p>
                            </div>
                        </div>

                        <div class="bg-white border px-4 py-3 mt-3 rounded">
                            <div class="">
                                <div class="flex justify-between items-center">
                                    <p class="text-base text-neutral-700">User Creation Settings</p>
                                    <p class="text-sm text-blue-400 font-medium">20%</p>
                                </div>
                            </div>
                            <div class="bg-neutral-100 rounded h-1 relative mt-3">
                                <div class="w-[20%] h-1 bg-blue-400 rounded"></div>
                            </div>
                            <div class="pt-1.5">
                                <p class="text-xs text-neutral-400">80% of required general settings</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="pt-10">
                    <div class="flex justify-between">
                        <p class="font-medium text-lg text-neutral-800">Today’s Shifts</p>
                        
                        <button class="inline-flex rounded border border-blue-100 bg-blue-50 p-2 text-sm text-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none transition-all w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="pt-2">
                        <div class="bg-white border px-4 pt-3 pb-4 mt-3 rounded">
                            <div class="">
                                <div class="flex justify-between items-center">
                                    <p class="text-base text-neutral-800">Morning Shift</p>
                                    
                                    <button class="w-7 h-7 hover:bg-blue-50 text-neutral-500 hover:text-blue-600 rounded-full text-center transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-40 flex items-center mt-2">
                                <div class="bg-neutral-100 w-36 rounded h-0.5 w- relative">
                                    <div class="w-[85%] h-0.5 bg-blue-400  rounded"></div>
                                </div>
                                <p class="text-xs pl-2 text-blue-400 font-medium">80%</p>
                            </div>
                            
                            <div class="pt-5 grid grid-cols-2">
                                <div>
                                    <p class="text-xs text-neutral-400">Time</p>
                                    <p class="font-medium text-sm pt-2">09:00 AM - 06:00 PM</p>
                                </div>

                                <div class="flex justify-end">
                                    <div class="ml-auto">
                                        <p class="text-xs text-neutral-400">Members</p>
                                        <dd class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-1.5 pt-2">
                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >
                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >

                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >
                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >
                                            <span class="w-5 text-[9px] leading-5 font-medium text-center h-5 rounded-full bg-blue-500 text-white ring-2 ring-white" >
                                                25+
                                            </span>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border px-4 pt-3 pb-4 mt-3 rounded">
                            <div class="">
                                <div class="flex justify-between items-center">
                                    <p class="text-base text-neutral-800">Night Shift</p>
                                    
                                    <button class="w-7 h-7 hover:bg-blue-50 text-neutral-500 hover:text-blue-600 rounded-full text-center transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-40 flex items-center mt-2">
                                <div class="bg-neutral-100 w-36 rounded h-0.5 w- relative">
                                    <div class="w-[85%] h-0.5 bg-blue-400  rounded"></div>
                                </div>
                                <p class="text-xs pl-2 text-blue-400 font-medium">80%</p>
                            </div>
                            
                            <div class="pt-5 grid grid-cols-2">
                                <div>
                                    <p class="text-xs text-neutral-400">Time</p>
                                    <p class="font-medium text-sm pt-2">05:00 AM - 03:00 PM</p>
                                </div>

                                <div class="flex justify-end">
                                    <div class="ml-auto">
                                        <p class="text-xs text-neutral-400">Members</p>
                                        <dd class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-1.5 pt-2">
                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >
                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >

                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >
                                            <img src="@/assets/user.png" alt="user name" class="w-5 h-5 rounded-full bg-slate-100 ring-2 ring-white" >
                                            <span class="w-5 text-[9px] leading-5 font-medium text-center h-5 rounded-full bg-blue-500 text-white ring-2 ring-white" >
                                                25+
                                            </span>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-10">
                    <div class="flex justify-between">
                        <p class="font-medium text-lg leading-6 text-neutral-800">
                            New Joinee 
                            <span class="w-5 text-[9px] leading-5 font-medium text-center h-5 rounded-full bg-blue-500 text-white ring-2 ring-white inline-block">10</span>
                        </p>
                        
                        <button class="inline-flex rounded border border-blue-100 bg-blue-50 p-2 text-sm text-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none transition-all w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="pt-2">
                        <div v-for="(item, index) in [1, 2, 3, 4]" :key="index" class="flex justify-between space-x-3 shadow-lg shadow-transparent hover:bg-white hover:shadow-lg hover:shadow-neutral-100 px-2 py-3 mt-1 rounded">
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
                                    <div class="pl-3 w-28">
                                        <p class=" text-neutral-800 font-medium text-sm truncate">Kuntal Patra</p>
                                        <p class="text-xs text-neutral-400">Sr. Developer</p>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="">
                                <p class="text-xs text-neutral-400">15th Jun, 2023</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-10">
                    <TabGroup>
                        <TabList class="flex space-x-10 border-b">
                            <Tab
                                v-for="items in EventCategories"
                                as="template"
                                :key="items.id"
                                v-slot="{ selected }"
                            >
                            <button :class="[ 'border-b-2 py-1.5 text-xs font-medium leading-5',
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
                            <TabPanel v-for="items in EventCategories" :key="items.id">
                                <div>
                                    <div v-for="(item, index) in [1, 2, 3, 4, 5]" :key="index" class="flex justify-between items-center space-x-3 shadow-lg shadow-transparent hover:bg-white hover:shadow-lg hover:shadow-neutral-100 px-2 py-3 mt-1 rounded">
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
                                                <div class="pl-3 w-28">
                                                    <p class=" text-neutral-800 font-medium text-sm truncate">Kuntal Patra</p>
                                                    <p class="text-xs text-neutral-400">Sr. Developer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <p class="text-xs text-emerald-500 font-medium">Today</p>
                                        </div>
                                    </div>
                                </div>
                            </TabPanel>
                        </TabPanels>
                    </TabGroup>

                </div>

            </div>
        </section>
        <!-- <AdminSettingModal/> -->
    </EmployeeLayout>
</template>
<script>
    import EmployeeLayout from './EmployeeLayout.vue';
    // import AdminSettingModal from '../../components/AdminSettingModal.vue';
    import moment from 'moment';
    import DropDown from '../../components/DropDown.vue';
    import DatePickerDate from '../../components/DatePickerDate.vue';
    import {ChevronDownIcon, ChevronRightIcon, ArrowDownTrayIcon} from '@heroicons/vue/24/solid';
    import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
    import axios from "axios";
    //import { BASE_URL } from "../config";
    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'EmployeeDashboard',
        components:{
            EmployeeLayout,
            
            DropDown,
            DatePickerDate,
            ChevronDownIcon,
            ArrowDownTrayIcon,
            ChevronRightIcon,
            TabGroup,
            TabList,
            Tab,
            TabPanels,
            TabPanel

        },
        data() {
            return {
                storage:storage,
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
                employeeName : ''
            }
        },
        created(){
            console.log("EMPLOYEE DETAILS: ",this.storage.employeeDetails);
            this.employeeName = this.storage.employeeDetails.fname;
        },
        computed:{
            formattedDate(){
                const dateObject = new Date();
                return moment(dateObject).format('LLLL'); 
            },
        },
        mounted() {
            // Make a GET request to the ipify API to retrieve the client's public IP address
            axios.get('https://api.ipify.org?format=json')
            .then(response => {
                //this.ipAddress = response.data.ip;
                //console.log("IP:",this.ipAddress);
                this.storage.set("ipAddress", response.data.ip);
            })
            .catch(error => {
                console.error('Error fetching IP address:', error);
            });
        },
        

    }


</script>