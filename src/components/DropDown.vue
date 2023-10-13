<template>
    <div class="relative">
      <Listbox v-model="selectedOption">
        <ListboxButton class="py-2 pl-2 pr-8 border rounded flex text-sm shadow-sm text-neutral-500 bg-white w-full truncate">
            <span class="text-neutral-700 truncate block" v-if="selectedOption">{{ selectedOption }}</span>
            <span v-else class="truncate block">{{ message }}</span>
            
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <ChevronUpDownIcon class="h-5 w-5 text-neutral-400" aria-hidden="true"/>
            </span>
        </ListboxButton>

        <transition
          leave-active-class="transition duration-100 ease-in"
          leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >

            <ListboxOptions as="ul" class="absolute mt-2 w-full p-2 rounded bg-white shadow-lg">
                <ListboxOption v-slot="{ active, selected }" v-for="(option, index) in options" :key="index" :value="option" as="template" >
                    <li :class="[ active ? 'bg-blue-50 text-blue-500' : 'text-neutral-500', ' relative cursor-pointer text-sm rounded  py-2 pl-8 pr-4',]">
                        <span :class="[ selected ? 'font-medium text-blue-500' : 'font-normal', 'block truncate']">
                            {{option}}
                        </span>

                        <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-2 text-blue-600">
                            <CheckIcon class="h-4 w-4" aria-hidden="true" />
                        </span>
                    </li>
                </ListboxOption>
            </ListboxOptions>
        </transition>
      </Listbox>
    </div>
  </template>
  
  <script>
  import { Listbox, ListboxButton, ListboxOptions, ListboxOption } from '@headlessui/vue';
  import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/24/solid'
  
  export default {
    props: {
      options: {
        type: Array,
        required: true,
      },
      message:{
        type: String,
        required: true,
      },
      value: {
        type: String,
        required: true,
      },
    },
    components: {
      Listbox,
      ListboxButton,
      ListboxOptions,
      ListboxOption,
      ChevronUpDownIcon,
      CheckIcon
    },
    data() {
      return {
        selectedOption: this.value,
      };
    },
  };
  </script>