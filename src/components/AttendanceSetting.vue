<template>
    <form v-on:submit.prevent="submitAttendanceForm" class="" ref="submitAttendanceForm" name="submitAttendanceForm">
        <div class="grid grid-cols-2 py-5 gap-7">
            <!-- SHIFT TYPE-->
            <div class="col-span-2">
                <label class="input-label">Choose Shift Type <span class="text-red-500">*</span></label>
                <div class="flex">
                    <div class="radio-box">
                        <input type="radio" name="shiftTupe" id="general" value="General" v-model="shiftType" />
                        <label for="general" class="radio-label">General</label>
                    </div>
                    <div class="ml-4 radio-box">
                        <input type="radio" name="shiftTupe" id="Manual" value="Manual" v-model="shiftType" />
                        <label for="Manual" class="radio-label">Manual</label>
                    </div>
                </div>

            </div>
            <!-- GENERAL SHIFT -->
            <div class="col-span-2" v-if="shiftType == 'General'">
                <p class="pt-5 mt-4 text-base font-semibold border-t text-neutral-700 border-neutral-100">Add General Shift</p>
                <div class="grid grid-cols-2 py-5 gap-7">
                    <div>
                        <label class="text-sm text-neutral-700 font-medium  pb-2 block">General Full Day Shift Hours</label>
                        <div class="grid grid-cols-2 gap-7">
                            <div>
                                <label class="input-label">From</label>
                                <input class="form-control" type="time" placeholder="Select start hours" v-model="attendanceState.defineFullShiftFrom"/>
                                <!-- <VueTimePicker placeholder="Select start hours" v-model="attendanceState.staryTimeData" ></VueTimePicker> -->
                                <!-- <span v-if="v2$.defineFullShiftFrom.$error" class="error">
                                    {{ v2$.defineFullShiftFrom.$errors[0].$message }}
                                </span> -->
                            </div>    
                            <div>
                                <label class="input-label"> To</label>
                                <input class="form-control" type="time" placeholder="Select end hours" v-model="attendanceState.defineFullShiftTo"/>
                                <!-- <VueTimePicker placeholder="Select end hours" v-model="attendanceState.endTimeData" ></VueTimePicker> -->
                                <!-- <span v-if="v2$.defineFullShiftTo.$error" class="error">
                                    {{ v2$.defineFullShiftTo.$errors[0].$message }}
                                </span> -->
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-neutral-700 font-medium pb-2 block">General Half Day Shift Hours</label>
                        <div class="grid grid-cols-2 gap-7">
                            <div>
                                <label class="input-label">From</label>
                                <input class="form-control" type="time" v-model="attendanceState.defineHalfShiftFrom" placeholder="Select start hours"/>
                                <!-- <span v-if="v2$.defineHalfShiftFrom.$error1" class="error">
                                    {{ v2$.defineHalfShiftFrom.$errors[0].$message }}
                                </span> -->
                            </div>
                            <div>
                                <label class="input-label ">To</label>
                                <input class="form-control" type="time" v-model="attendanceState.defineHalfShiftTo" placeholder="Select end hours"/>
                                <!-- <span v-if="v2$.defineHalfShiftTo.$error1" class="error">
                                    {{ v2$.defineHalfShiftTo.$errors[0].$message }}
                                </span> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4" v-if="shiftType">
                    <label class="input-label">Do working days vary weekly? <span class="text-red-500">*</span></label>
                    <div class="flex pt-2">
                        <div class="radio-group">
                            <input type="radio" name="workingWeek" id="yes" value="yes" v-model="attendanceState.everyWeekGen" />
                            <label for="yes" class="radio-label">Yes</label>
                        </div>
                        <div class="ml-8 radio-group">
                            <input type="radio" name="workingWeek" id="no" value="no" v-model="attendanceState.everyWeekGen" />
                            <label for="no" class="radio-label">No</label>
                        </div>
                    </div>
                    <!-- <span v-if="v2$.everyWeekGen.$error1" class="error">
                        {{ v2$.everyWeekGen.$errors[0].$message }}
                    </span> -->
                </div>
                <div class="col-span-2" v-if="attendanceState.everyWeekGen">
                    <div class="pt-4">
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
                    </div>
                    <div v-if="attendanceState.everyWeekGen === 'yes'">
                        <div class="flex items-center  pt-4" v-for="items in specifyDateGArrays" :key="items.id">
                            <p class="w-24 pl-3 text-sm font-semibold text-neutral-700">{{items.weekName}}</p>
                            <div v-for="item in items.days" :key="item.id" class="w-[85px] ml-4" >
                                <select class="shift-control-select" v-model="item.val">
                                    <option value="Full Day">Full Day</option>
                                    <option value="Half Day">Half Day</option>
                                    <option value="Non-Working">Non-Working</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div v-if="attendanceState.everyWeekGen === 'no'">
                        <div class="flex items-center pt-4 pb-2" v-for="items in specifyDateGOneArray" :key="items.id">
                            <p class="w-24 pl-3 text-sm font-semibold text-neutral-700">{{items.weekName}}</p>
                            
                            <div v-for="item in items.days" :key="item.id" class="w-[85px] ml-4">
                                
                                <select class="shift-control-select" v-model="item.val">
                                    <option value="Full Day">Full Day</option>
                                    <option value="Half Day">Half Day</option>
                                    <option value="Non-Working">Non-Working</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="attendanceState.everyWeekGen">
                    <div class="grid grid-cols-3 py-5 gap-7 border-t mt-5">
                        <div>
                            <label class="input-label">Roster Name</label>
                            <input readonly class="form-control" type="text" value="General Roster" placeholder="Enter Roster Name"/>
                             
                        </div>
                        <div>
                            <label class="input-label">Effective From <span class="text-red-500">*</span></label>
                            <datepicker  v-model="attendanceState.effectiveGFrom" />    
                            <!-- <span v-if="v2$.effectiveGFrom.$error1" class="error">
                                {{ v2$.effectiveGFrom.$error1[0].$message }}
                            </span>     -->
                        </div>
                        <div>
                            <label class="input-label">Effective To</label>
                            <datepicker v-model="attendanceState.effectiveGTo" />   
                            <!-- <span v-if="v2$.effectiveGTo.$error" class="error">
                                {{ v2$.effectiveGTo.$errors[0].$message }}
                            </span> -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- MANUAL SHIFT -->
            <div class="col-span-2" v-if="shiftType == 'Manual'">
                <p v-if="shiftList.length >0" class="pt-5 mt-4 text-base font-semibold border-t text-neutral-700 border-neutral-100">Shift List</p>
                <!-- <div> -->
                <table class="table-auto w-full" v-if="shiftList.length >0">
                    <thead class="bg-neutral-100 text-xs text-neutral-600 rounded border-b border-neutral-300">
                        <tr>
                            <th class="font-medium px-3 py-2.5 w-2/6" >Shift Name</th>
                            <th class="font-medium px-3 py-2.5 w-1/6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b text-neutral-700" v-for="shift in shiftList" :key="shift._id">
                            <td class="text-sm px-3 py-3" v-if="!shift.editDiv">{{ shift.shiftName}} </td>
                            <td class="text-sm px-3 py-3" v-else>
                                <input type="text" v-model="shift.shiftName" class="form-control" placeholder="Enter Shift Name"/>
                            </td>
                            <td class="text-sm px-3 py-3">
                                <!-- <button class="px-1.5 text-neutral-600 hover:text-blue-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button> -->
                                <!-- @click="editDepartmentDiv(department._id)" -->
                                <button v-if="shift.editDiv" v-on:click="clickToEdit(shift)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                                <button v-if="!shift.editDiv" v-on:click="clickToEdit(shift)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button v-else v-on:click="editShift(shift._id,shift.shiftName),clickToEdit(shift)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </button>
                                <!-- <button @click="deleteShift(department._id)" class="px-1.5 text-neutral-600 hover:text-red-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- </div> -->
                <p class="pt-5 mt-4 text-base font-semibold border-t text-neutral-700 border-neutral-100">Add Manual Shift</p>
                <div class="grid items-end grid-cols-9 gap-3" v-for="(field, index) in addNewShift" :key="index">
                    
                    <div class="col-span-4 pt-4">
                        <label class="input-label">Shift Name <span class="text-red-500">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Shift name" v-model="field.shiftName"/>
                    </div>
                    <div class="col-span-2 pt-4">
                        <label class="input-label">From <span class="text-red-500">*</span></label>
                        <input class="form-control" type="time" placeholder="" v-model="field.from"/>
                    </div>
                    <div class="col-span-2 pt-4">
                        <label class="input-label"> To <span class="text-red-500">*</span></label>
                        <div class="flex">
                            <input class="form-control" type="time" placeholder="" v-model="field.to"/>
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
                
                <div class="mt-5 py-5 text-sm font-semibold text-blue-500 rounded" >
                    <!-- @click="closeModal -->
                    <button 
                        type="button" 
                        class="ml-auto mr-2 btn-primary-light"
                        @click="addShiftDetails()"
                    >
                        Save
                    </button>
                    <button 
                        type="button"
                        class="btn-primary"
                        @click="addField"
                    >
                        Add More
                    </button>
                </div>
                <p v-if="rosterList.length >0" class="pt-5 mt-4 text-base font-semibold border-t text-neutral-700 border-neutral-100">Roster List</p>
                <!-- <div> -->
                <table class="table-auto w-full" v-if="rosterList.length >0">
                    <thead class="bg-neutral-100 text-xs text-neutral-600 rounded border-b border-neutral-300">
                        <tr>
                            <th class="font-medium px-3 py-2.5 w-2/6" >Roster Name</th>
                            <th class="font-medium px-3 py-2.5 w-1/6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b text-neutral-700" v-for="roster in rosterList" :key="roster._id">
                            <td class="text-sm px-3 py-3" v-if="!roster.editDiv">{{ roster.rosterName}} </td>
                            <td class="text-sm px-3 py-3" v-else>
                                <input type="text" v-model="roster.rosterName" class="form-control" placeholder="Enter Roster Name"/>
                            </td>
                            <td class="text-sm px-3 py-3">
                                <!-- <button class="px-1.5 text-neutral-600 hover:text-blue-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button> -->
                                <!-- @click="editDepartmentDiv(department._id)" -->
                                <button v-if="roster.editDiv" v-on:click="clickToEditRoster(roster)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                                <button v-if="!roster.editDiv" v-on:click="clickToEditRoster(roster)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button v-else v-on:click="editRoster(roster._id,roster.rosterName),clickToEditRoster(roster)" class="px-1.5 text-neutral-600 hover:text-orange-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </button>
                                <!-- <button @click="deleteShift(department._id)" class="px-1.5 text-neutral-600 hover:text-red-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- </div> -->
                <div class="pt-4 border-t" v-if="shiftType">
                    <label class="input-label">Do working days vary weekly? <span class="text-red-500">*</span></label>
                    <div class="flex pt-2">
                        <div class="radio-group">
                            <input type="radio" name="everyWeekMen" id="yes" value="yes" v-model="attendanceState2.everyWeekMen" />
                            <label for="yes" class="radio-label">Yes</label>
                        </div>
                        <div class="ml-8 radio-group">
                            <input type="radio" name="everyWeekMen" id="no" value="no" v-model="attendanceState2.everyWeekMen" />
                            <label for="no" class="radio-label">No</label>
                        </div>
                    </div>
                    <!-- <span v-if="v22$.everyWeekMen.$error2" class="error">
                        {{ v22$.everyWeekMen.$errors[0].$message }}
                    </span> -->
                </div>
                <div class="col-span-2" v-if="attendanceState2.everyWeekMen">
                    <div class="pt-4">
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
                    </div>
                    <div v-if="attendanceState2.everyWeekMen === 'yes'">
                        <div class="flex items-center  pt-4" v-for="items in specifyDateMArrays" :key="items.id">
                            <p class="w-24 pl-3 text-sm font-semibold text-neutral-700">{{items.weekName}}</p>
                            <div v-for="item in items.days" :key="item.id" class="w-[85px] ml-4" >
                                <select class="shift-control-select" v-model="item.val">
                                    <option :value="shift.shiftName" v-for="shift in shiftList" :key="shift._id">
                                        {{ shift.shiftName }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div v-if="attendanceState2.everyWeekMen === 'no'">
                        <div class="flex items-center pt-4 pb-2" v-for="items in specifyDateMOneArray" :key="items.id">
                            <p class="w-24 pl-3 text-sm font-semibold text-neutral-700">{{items.weekName}}</p>
                            <div v-for="item in items.days" :key="item.id" class="w-[85px] ml-4">
                                <select class="shift-control-select" v-model="item.val">
                                    <option :value="shift.shiftName" v-for="shift in shiftList" :key="shift._id">
                                        {{ shift.shiftName }}
                                    </option>
                                    <!-- <option value="Full Day">Full Day</option>
                                    <option value="Half Day">Half Day</option>
                                    <option value="Non-Working">Non-Working</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-3 py-5 gap-7 border-t mt-5" >
                            <div>
                                <label class="input-label">Roster Name</label>
                                <input class="form-control"  v-model="attendanceState2.rosterName" type="text" placeholder="Enter Roster Name"/>
                                <!-- <span v-if="v22$.rosterName.$error2" class="error">
                                    {{ v22$.rosterName.$errors[0].$message }}
                                </span>  -->
                            </div>
                            <div>
                                <label class="input-label">Effective From</label>
                                <!-- <input class="form-control" type="text" placeholder="Select to start date"/> -->
                                <datepicker  v-model="attendanceState2.effectiveMFrom" />    
                                <!-- <span v-if="v22$.effectiveMFrom.$error2" class="error">
                                    {{ v22$.effectiveMFrom.$errors[0].$message }}
                                </span>  -->
                            </div>
                            <div>
                                <label class="input-label">Effective To</label>
                                <!-- <input class="form-control" type="text" placeholder="Select to end date"/> -->
                                <datepicker v-model="attendanceState2.effectiveMTo" />   
                                <!-- <span v-if="v22$.effectiveMTo.$error2" class="error">
                                    {{ v22$.effectiveMTo.$errors[0].$message }}
                                </span> -->
                            </div>
                        </div>
                    </div>
                    <div >
                        <button 
                            type="button" 
                            class="ml-auto mr-2 btn-primary-light"
                            @click="addRosterDetails('save')"
                        >
                            Save
                        </button>
                        <button 
                            type="button"
                            class="btn-primary"
                            @click="addRosterDetails('save and add new')"
                        >
                            Save & Add New
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between pt-8 border-t">
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
    import { reactive } from "vue";
    //import { reactive, computed } from "vue";
    //import useValidate from "@vuelidate/core";
    //import { required } from "@vuelidate/validators";
    import { BASE_URL } from "../config";
    import axios from "axios";
    import Datepicker from 'vue3-datepicker';
    import { createLocal } from 'the-storages';

    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'AttendanceSetting',
        components:{
            Datepicker
        },
        setup() {
            const attendanceState = reactive({
                effectiveGFrom: new Date(),
                effectiveGTo: new Date(),
                defineFullShiftFrom: '',
                defineFullShiftTo: '',
                defineHalfShiftFrom: '',
                defineHalfShiftTo: '',
                everyWeekGen:'',
            })
            const attendanceState2 = reactive({
                effectiveMFrom: new Date(),
                effectiveMTo: new Date(),
                staryTimeData: '',
                endTimeData: '',
                defineHShiftFrom: '',
                defineHShiftTo: '',
                everyWeekMen:'',
                rosterName:'',
            })
    
            // const rules2 = computed(() => {
            //     return {
            //         effectiveFrom: { required },
            //         effectiveTo: { required },
            //         staryTimeData: { required },
            //         endTimeData: { required },
            //         defineHShiftFrom: { required },
            //         defineHShiftTo: { required },
            //         everyWeekGen: { required },
            //         everyWeekMen: { required },
            //         rosterName: { required },
            //         effectiveMFrom: { required },
            //         effectiveMTo: { required },
            //     }
            // })
            // const v2$ = useValidate(rules2, attendanceState)
            // const v22$ = useValidate(rules2, attendanceState2)
    
            return {
                attendanceState,
                attendanceState2,
                // v2$,
                // v22$
            }
        },

        data() {
            return {
                storage:storage,
                shiftType:'',
                specifyDateGArrays: [
                    {
                        weekName:'Week1',
                        days: [
                            {name: 'Sunday1', val: 'Non-Working'},
                            {name: 'Monday1', val: 'Full Day'},
                            {name: 'Tuesday1', val: 'Full Day'},
                            {name: 'Wednesday1', val: 'Full Day'},
                            {name: 'Thursday1', val: 'Full Day'},
                            {name: 'Friday1', val: 'Full Day'},
                            {name: 'Saturday1', val: 'Full Day'},
                        ]
                    },
                    {
                        weekName:'Week2',
                        days: [
                            {name: 'Sunday2', val: 'Non-Working'},
                            {name: 'Monday2', val: 'Full Day'},
                            {name: 'Tuesday2', val: 'Full Day'},
                            {name: 'Wednesday2', val: 'Full Day'},
                            {name: 'Thursday2', val: 'Full Day'},
                            {name: 'Friday2', val: 'Full Day'},
                            {name: 'Saturday2', val: 'Full Day'}
                        ]
                    },
                    {
                        weekName:'Week3',
                        days: [
                            {name: 'Sunday3', val: 'Non-Working'},
                            {name: 'Monday3', val: 'Full Day'},
                            {name: 'Tuesday3', val: 'Full Day'},
                            {name: 'Wednesday3', val: 'Full Day'},
                            {name: 'Thursday3', val: 'Full Day'},
                            {name: 'Friday3', val: 'Full Day'},
                            {name: 'Saturday3', val: 'Full Day'}
                        ]
                    },
                    {
                        weekName:'Week4',
                        days: [
                            {name: 'Sunday4', val: 'Non-Working'},
                            {name: 'Monday4', val: 'Full Day'},
                            {name: 'Tuesday4', val: 'Full Day'},
                            {name: 'Wednesday4', val: 'Full Day'},
                            {name: 'Thursday4', val: 'Full Day'},
                            {name: 'Friday4', val: 'Full Day'},
                            {name: 'Saturday4', val: 'Full Day'}
                        ]
                    },
                    {
                        weekName:'Week5',
                        days: [
                            {name: 'Sunday5', val: 'Non-Working'},
                            {name: 'Monday5', val: 'Full Day'},
                            {name: 'Tuesday5', val: 'Full Day'},
                            {name: 'Wednesday5', val: 'Full Day'},
                            {name: 'Thursday5', val: 'Full Day'},
                            {name: 'Friday5', val: 'Full Day'},
                            {name: 'Saturday5', val: 'Full Day'}
                        ]
                    },
                    
                ],
                specifyDateMArrays: [
                    {
                        weekName:'Week1',
                        days: [
                            {name: 'Sunday1', val: 'Non-Working'},
                            {name: 'Monday1', val: 'Full Day'},
                            {name: 'Tuesday1', val: 'Full Day'},
                            {name: 'Wednesday1', val: 'Full Day'},
                            {name: 'Thursday1', val: 'Full Day'},
                            {name: 'Friday1', val: 'Full Day'},
                            {name: 'Saturday1', val: 'Full Day'},
                        ]
                    },
                    {
                        weekName:'Week2',
                        days: [
                            {name: 'Sunday2', val: 'Non-Working'},
                            {name: 'Monday2', val: 'Full Day'},
                            {name: 'Tuesday2', val: 'Full Day'},
                            {name: 'Wednesday2', val: 'Full Day'},
                            {name: 'Thursday2', val: 'Full Day'},
                            {name: 'Friday2', val: 'Full Day'},
                            {name: 'Saturday2', val: 'Full Day'}
                        ]
                    },
                    {
                        weekName:'Week3',
                        days: [
                            {name: 'Sunday3', val: 'Non-Working'},
                            {name: 'Monday3', val: 'Full Day'},
                            {name: 'Tuesday3', val: 'Full Day'},
                            {name: 'Wednesday3', val: 'Full Day'},
                            {name: 'Thursday3', val: 'Full Day'},
                            {name: 'Friday3', val: 'Full Day'},
                            {name: 'Saturday3', val: 'Full Day'}
                        ]
                    },
                    {
                        weekName:'Week4',
                        days: [
                            {name: 'Sunday4', val: 'Non-Working'},
                            {name: 'Monday4', val: 'Full Day'},
                            {name: 'Tuesday4', val: 'Full Day'},
                            {name: 'Wednesday4', val: 'Full Day'},
                            {name: 'Thursday4', val: 'Full Day'},
                            {name: 'Friday4', val: 'Full Day'},
                            {name: 'Saturday4', val: 'Full Day'}
                        ]
                    },
                    {
                        weekName:'Week5',
                        days: [
                            {name: 'Sunday5', val: 'Non-Working'},
                            {name: 'Monday5', val: 'Full Day'},
                            {name: 'Tuesday5', val: 'Full Day'},
                            {name: 'Wednesday5', val: 'Full Day'},
                            {name: 'Thursday5', val: 'Full Day'},
                            {name: 'Friday5', val: 'Full Day'},
                            {name: 'Saturday5', val: 'Full Day'}
                        ]
                    },
                ],
                specifyDateGOneArray: [
                    {
                        weekName: 'All Week',
                        days: [
                            {name: 'Sunday', val: 'Non-Working'},
                            {name: 'Monday', val: 'Full Day'},
                            {name: 'Tuesday', val: 'Full Day'},
                            {name: 'Wednesday', val: 'Full Day'},
                            {name: 'Thursday', val: 'Full Day'},
                            {name: 'Friday', val: 'Full Day'},
                            {name: 'Saturday', val: 'Full Day'},
                        ]
                    },
                ],
                specifyDateMOneArray: [
                    {
                        weekName: 'All Week',
                        days: [
                            {name: 'Sunday', val: 'Non-Working'},
                            {name: 'Monday', val: 'Full Day'},
                            {name: 'Tuesday', val: 'Full Day'},
                            {name: 'Wednesday', val: 'Full Day'},
                            {name: 'Thursday', val: 'Full Day'},
                            {name: 'Friday', val: 'Full Day'},
                            {name: 'Saturday', val: 'Full Day'},
                        ]
                    },
                ],
                addNewShift:[
                    {shiftName:"", from:"", to:""}
                ],
                shiftList:[],
                rosterList:[],
                //aSDetails:''
            }
        },

        async created(){
            console.log("test",this.shiftType);
            console.log("ARRAY::",this.specifyDateGArrays);
            this.getShiftList();
            this.getRosterList();
            this.getAttendanceSettingDetails();
            
        },

        methods:{
            async skipToDefault(){
                const formData2 = {
                    "step": 'attendance',
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
            clickToEdit(shift){
                //this.editDiv[index] = true;
                shift.editDiv = !shift.editDiv; // Toggle the editable stat
            },
            async editShift(id,name){
                const formData = {
                    "id": id,
                    "shiftName": name
                };
                console.log("data:",formData);
                await axios.put(BASE_URL + '/edit-shift',formData)
                .then((response)=>{
                    console.log(response.data);
                    //department.editDiv = false;
                    this.getShiftList();
                })
                
            },

            clickToEditRoster(roster){
                //this.editDiv[index] = true;
                roster.editDiv = !roster.editDiv; // Toggle the editable stat
            },
            async editRoster(id,name){
                const formData = {
                    "id": id,
                    "rosterName": name
                };
                console.log("data:",formData);
                await axios.put(BASE_URL + '/edit-roster',formData)
                .then((response)=>{
                    console.log(response.data);
                    //department.editDiv = false;
                    this.getRosterList();
                })
                
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
            async getAttendanceSettingDetails(){
                const shiftData = {
                    "companyId": this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/attendance-setting-details',shiftData)
                .then((response)=>{
                    this.shiftType =  response.data?.shiftType;
                    console.log("ATTENDANCE SETTING LIST:: ",response.data);
                    console.log("ATTENDANCE SETTING LIST2:: ",response.data?.rosterDetails[0]?.workingDaysVaryWeekly);

                    this.attendanceState.defineFullShiftFrom = response.data?.shiftDetails[0]?.shiftFrom;
                    this.attendanceState.defineFullShiftTo = response.data?.shiftDetails[0]?.shiftTo;
                    this.attendanceState.defineHalfShiftFrom = response.data?.shiftDetails[1]?.shiftFrom;
                    this.attendanceState.defineHalfShiftTo = response.data?.shiftDetails[1]?.shiftTo;
                    if(response.data?.rosterDetails[0]?.workingDaysVaryWeekly){
                        this.attendanceState.everyWeekGen = response.data?.rosterDetails[0]?.workingDaysVaryWeekly;
                        this.attendanceState.effectiveGFrom = (new Date(response.data?.rosterDetails[0]?.effectiveFrom))?new Date(response.data?.rosterDetails[0]?.effectiveFrom) :new Date();
                        this.attendanceState.effectiveGTo = (new Date(response.data?.rosterDetails[0]?.effectiveTo))?new Date(response.data?.rosterDetails[0]?.effectiveTo):new Date();
                    }
                    
                    //this.shiftType = this.shiftType;
                })
            },
            async getShiftList(){
                const shiftData = {
                    "companyId": this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/shift-list',shiftData)
                .then((response)=>{
                    this.shiftList =  response.data.shiftList;
                    console.log("SHIFT LIST:: ",response.data);
                })
            },
            async getRosterList(){
                const rosterData = {
                    "companyId": this.storage.companyDetails._id
                };
                await axios.post(BASE_URL + '/roster-list',rosterData)
                .then((response)=>{
                    this.rosterList =  response.data.rosterList;
                    console.log("ROSTER LIST:: ",response.data);
                })
            },
            async addShiftDetails(){
                const formData = {
                    "companyId": this.storage.companyDetails._id,
                    "ipAddress": this.storage.ipAddress,
                    "shiftType": this.shiftType,
                    "shiftDetails": this.addNewShift
                };
                //alert("SUBMIT IN",formData);
                await axios.post(BASE_URL + '/add-shift-details',formData)
                .then((response)=>{
                    console.log(response.data);
                    this.addNewShift    = [{shiftName:"", from:"", to:""}];
                    this.getShiftList();
                })
            },
            async addRosterDetails(value){
                const formData = {
                    "companyId": this.storage.companyDetails._id,
                    "ipAddress": this.storage.ipAddress,
                    "shiftType": this.shiftType,
                    "effectiveFrom": this.attendanceState2.effectiveMFrom,
                    "effectiveTo": this.attendanceState2.effectiveMTo,
                    // "shiftDetails": this.addNewShift,
                    "rosterName": this.attendanceState2.rosterName,
                    "everyWeekMen": this.attendanceState2.everyWeekMen,
                    "specifyDateMArrays": (this.attendanceState2.everyWeekMen=='yes')? this.specifyDateMArrays:'',
                    "specifyDateMOneArray": (this.attendanceState2.everyWeekMen=='no')? this.specifyDateMOneArray:'',
                };
                //alert("SUBMIT IN",formData);
                await axios.post(BASE_URL + '/add-roster-details',formData)
                .then((response)=>{
                    console.log(response.data);
                    if(value!='save'){
                        this.attendanceState2.rosterName = '';
                        this.attendanceState2.effectiveMFrom = new Date();
                        this.attendanceState2.effectiveMTo = new Date();
                        this.arrayBlank();
                        //this.specifyDateMArrays = [];
                        //this.specifyDateMOneArray = [];
                    }
                    this.getRosterList();
                })
            },
            async submitAttendanceForm(){
                console.log("ARRAY:",this.specifyDateGArrays);
                if(this.shiftType==='General'){
                    const formData = {
                        "companyId": this.storage.companyDetails._id,
                        "ipAddress": this.storage.ipAddress,
                        "shiftType": this.shiftType,
                        "effectiveFrom": this.attendanceState.effectiveGFrom,
                        "effectiveTo": this.attendanceState.effectiveGTo,
                        "staryTimeData": this.attendanceState.staryTimeData,
                        "endTimeData": this.attendanceState.endTimeData,
                        "defineFullShiftFrom": this.attendanceState.defineFullShiftFrom,
                        "defineFullShiftTo": this.attendanceState.defineFullShiftTo,
                        "defineHalfShiftFrom": this.attendanceState.defineHalfShiftFrom,
                        "defineHalfShiftTo": this.attendanceState.defineHalfShiftTo,
                        "everyWeekGen": this.attendanceState.everyWeekGen,
                        "specifyDateGArrays": (this.attendanceState.everyWeekGen=='yes')? this.specifyDateGArrays:'',
                        "specifyDateGOneArray": (this.attendanceState.everyWeekGen=='no')? this.specifyDateGOneArray:'',

                    };
                    //alert("SUBMIT IN",formData);
                    await axios.post(BASE_URL + '/submit-attendance-setting',formData)
                    .then((response)=>{
                        console.log(response.data);
                        this.closeModalProceed();
                    })
                } else {
                    const formData = {
                        "companyId": this.storage.companyDetails._id,
                        "ipAddress": this.storage.ipAddress,
                        "shiftType": this.shiftType,
                        "effectiveFrom": this.attendanceState2.effectiveMFrom,
                        "effectiveTo": this.attendanceState2.effectiveMTo,
                        "shiftDetails": this.addNewShift,
                        "rosterName": this.attendanceState2.rosterName,
                        "everyWeekMen": this.attendanceState2.everyWeekMen,
                        "specifyDateMArrays": (this.attendanceState2.everyWeekMen=='yes')? this.specifyDateMArrays:'',
                        "specifyDateMOneArray": (this.attendanceState2.everyWeekMen=='no')? this.specifyDateMOneArray:'',

                    };
                    await axios.post(BASE_URL + '/submit-attendance-setting',formData)
                    .then((response)=>{
                        console.log(response.data);
                        this.closeModalProceed();
                    })
                }
            },
            arrayBlank(){
                this.specifyDateMArrays = [
                    {
                        weekName:'Week1',
                        days: [
                            {name: 'Sunday1', val: ''},
                            {name: 'Monday1', val: ''},
                            {name: 'Tuesday1', val: ''},
                            {name: 'Wednesday1', val: ''},
                            {name: 'Thursday1', val: ''},
                            {name: 'Friday1', val: ''},
                            {name: 'Saturday1', val: ''},
                        ]
                    },
                    {
                        weekName:'Week2',
                        days: [
                            {name: 'Sunday2', val: ''},
                            {name: 'Monday2', val: ''},
                            {name: 'Tuesday2', val: ''},
                            {name: 'Wednesday2', val: ''},
                            {name: 'Thursday2', val: ''},
                            {name: 'Friday2', val: ''},
                            {name: 'Saturday2', val: ''}
                        ]
                    },
                    {
                        weekName:'Week3',
                        days: [
                            {name: 'Sunday3', val: ''},
                            {name: 'Monday3', val: ''},
                            {name: 'Tuesday3', val: ''},
                            {name: 'Wednesday3', val: ''},
                            {name: 'Thursday3', val: ''},
                            {name: 'Friday3', val: ''},
                            {name: 'Saturday3', val: ''}
                        ]
                    },
                    {
                        weekName:'Week4',
                        days: [
                            {name: 'Sunday4', val: ''},
                            {name: 'Monday4', val: ''},
                            {name: 'Tuesday4', val: ''},
                            {name: 'Wednesday4', val: ''},
                            {name: 'Thursday4', val: ''},
                            {name: 'Friday4', val: ''},
                            {name: 'Saturday4', val: ''}
                        ]
                    },
                    {
                        weekName:'Week5',
                        days: [
                            {name: 'Sunday5', val: ''},
                            {name: 'Monday5', val: ''},
                            {name: 'Tuesday5', val: ''},
                            {name: 'Wednesday5', val: ''},
                            {name: 'Thursday5', val: ''},
                            {name: 'Friday5', val: ''},
                            {name: 'Saturday5', val: ''}
                        ]
                    },
                ];
                this.specifyDateMOneArray = [
                    {
                        weekName: 'All Week',
                        days: [
                            {name: 'Sunday', val: 'Non-Working'},
                            {name: 'Monday', val: 'Full Day'},
                            {name: 'Tuesday', val: 'Full Day'},
                            {name: 'Wednesday', val: 'Full Day'},
                            {name: 'Thursday', val: 'Full Day'},
                            {name: 'Friday', val: 'Full Day'},
                            {name: 'Saturday', val: 'Full Day'},
                        ]
                    },
                ];
            }
        },
        watch:{
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