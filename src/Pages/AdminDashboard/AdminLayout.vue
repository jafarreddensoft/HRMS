<template>
    <header class="pl-14">
        <div class=" grid grid-cols-7">
            <div class="col-span-5 py-2 px-10 flex justify-between items-center">
                <div class="">
                    <img src="@/assets/logo.png" alt="logo"/>
                </div>
                <div class="flex">
                    <div class="relative w-60">
                        <button class="absolute top-2 left-2.5 text-neutral-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <input type="search" class="focus:border-blue-500 transition-all outline-0 w-full border pl-10 leading-6 text-neutral-600 text-xs pr-3 py-1.5 rounded" placeholder="Type to search..." alt=""/>
                    </div>

                    <!-- <button class="btn-primary ml-3">
                        <span class="pr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                            </svg>
                        </span>
                        <span>
                            Add Employee
                        </span>
                    </button> -->
                    <router-link class="btn-primary ml-3" to="/addemployee" >
                        <span class="pr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                            </svg>
                        </span>
                        <span class="pl-5">
                            Add Employee
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="py-2 px-7 col-span-2 bg-neutral-50/50 border-l">
                <div class="flex space-x-5 pt-4 justify-end">

                    <button class="text-neutral-600 hover:text-blue-500 transition-all relative">
                        <span class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-orange-500 text-[10px] text-white leading-4 text-center">
                            10
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <button class="text-neutral-600 hover:text-blue-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </button>

                    <button class="text-neutral-600 hover:text-blue-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                        </svg>
                    </button>

                </div>
            </div>
            
        </div>
    </header>
    <section class="LayoutDefault">
        <div class="fixed top-0 left-0 transition-all overflow-x-hidden sidebar z-10 bg-slate-900 min-h-screen" :class="{'w-64': isSidebar, 'w-14': !isSidebar}">
            <nav class="LayoutDefault__nav px-2.5 py-4">
                <button class="nav-link active" @click="this.isSidebar = !isSidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z" clip-rule="evenodd" />
                    </svg>
                </button>

                <ul class="pt-10 w-60">
                    <li class="pt-3">
                        <router-link class="flex flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ">
                                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                            </svg>
                            <span class="pl-5">
                                Dashboard
                            </span>
                            
                        </router-link>
                    </li>

                    <li class="pt-3">
                        <button class="flex w-full flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" @click="HandelFirstDropdown('Settings')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 01-.517.608 7.45 7.45 0 00-.478.198.798.798 0 01-.796-.064l-.453-.324a1.875 1.875 0 00-2.416.2l-.243.243a1.875 1.875 0 00-.2 2.416l.324.453a.798.798 0 01.064.796 7.448 7.448 0 00-.198.478.798.798 0 01-.608.517l-.55.092a1.875 1.875 0 00-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 01-.064.796l-.324.453a1.875 1.875 0 00.2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 01.796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 01.517-.608 7.52 7.52 0 00.478-.198.798.798 0 01.796.064l.453.324a1.875 1.875 0 002.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 01-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 001.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 01-.608-.517 7.507 7.507 0 00-.198-.478.798.798 0 01.064-.796l.324-.453a1.875 1.875 0 00-.2-2.416l-.243-.243a1.875 1.875 0 00-2.416-.2l-.453.324a.798.798 0 01-.796.064 7.462 7.462 0 00-.478-.198.798.798 0 01-.517-.608l-.091-.55a1.875 1.875 0 00-1.85-1.566h-.344zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd" />
                            </svg>

                            <span class="pl-5">
                                Settings
                            </span>

                            <span class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <transition
                            enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                            <ul class="pl-10" v-if="this.firstSideBarDrop === 'Settings'">
                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = true">
                                        <span>
                                            General Settings
                                        </span>
                                    </router-link>
                                </li>

                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = true">
                                        <span>
                                            Organization Settings
                                        </span>
                                    </router-link>
                                </li>

                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = true">
                                        <span>
                                            Role Allocation Settings
                                        </span>
                                    </router-link>
                                </li>

                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = true">
                                        <span>
                                            Attendance Settings
                                        </span>
                                    </router-link>
                                </li>

                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = true">
                                        <span>
                                            Leave Settings
                                        </span>
                                    </router-link>
                                </li>

                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = true">
                                        <span>
                                            Payroll Settings
                                        </span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link class="flex text-sm flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/addemployeemaster" @click="this.isSidebar = true">
                                        <span>
                                            Employee Form Settings
                                        </span>
                                    </router-link>
                                </li>
                            </ul>
                        </transition>
                    </li>

                    <li class="pt-3">
                        <router-link class="flex flex-nowrap text-white/60 flex-1 p-1.5 items-center hover:text-white transition-all" to="/dashboard/dc" @click="this.isSidebar = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ">
                                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                            </svg>
                            <span class="pl-5">
                                Dashboard
                            </span>
                            
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>

        <section class="pl-14 min-h-screen flex flex-col w-full">
            <main class="w-full">
                <slot></slot>
            </main>
            <footer class="text-center text-sm mt-auto py-4 px-5">
                © 2023 Reddensoft. All Rights Reserved. Made with love by Sohom Web Media!
            </footer>
        </section>

      
    </section>
  </template>


<script>


export default {
  name: 'AdminLayout',
  components: {
    
  },

  data(){
    return{
        isSidebar: false,
        firstSideBarDrop: '',
    }
  }, 

  methods:{
    HandelFirstDropdown(val){
        if(val === this.firstSideBarDrop){
            this.firstSideBarDrop = '';
        } else {
            this.firstSideBarDrop = val;
        }
        this.isSidebar = true;
        
    }
  }

};
</script>

