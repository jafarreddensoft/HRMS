<template>
    <div class="relative vue-date-picker">
      <DatePicker :style="dateStyle" placeholder="View other date" v-model="selectedDate" :format="datePickerFormat" :startingViewDate="selectedDate" @change="onDateChange" />
      <CalendarIcon class="h-5 w-5 text-neutral-500 absolute top-[9px] left-2" />
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import DatePicker from 'vue3-datepicker';
  import { CalendarIcon } from '@heroicons/vue/24/solid'
  
  export default {
    components: {
      DatePicker,
      CalendarIcon,
    },
    props: {
      value: {
        
        type: String,
        required: true,
      },
      format: {
        type: String,
        default: 'yyyy-MM-dd',
      },
    },
    data(){
      return{
        dateStyle:{
          "--vdp-bg-color": "#ffffff",
          "--vdp-text-color": "#2e2e2e",
          "--vdp-box-shadow": "0 4px 10px 0 rgba(128, 144, 160, 0.1), 0 0 1px 0 rgba(128, 144, 160, 0.81)",
          "--vdp-border-radius": "3px",
          "--vdp-heading-size": "2.5em",
          "--vdp-heading-weight": "bold",
          "--vdp-heading-hover-color": "#eeeeee",
          "--vdp-arrow-color": "currentColor",
          "--vdp-elem-color": "currentColor",
          "--vdp-disabled-color": "#d5d9e0",
          "--vdp-hover-color": "#ffffff",
          "--vdp-hover-bg-color": "#0b49ad",
          "--vdp-selected-color": "#ffffff",
          "--vdp-selected-bg-color": "#0b51ad",
          "--vdp-current-date-outline-color": "#888888",
          "--vdp-current-date-font-weight": "bold",
          "--vdp-elem-font-size": "0.8em",
          "--vdp-elem-border-radius": "3px",
          "--vdp-divider-color": "#d5d9e0"
        },
      }
    },
    setup(props, { emit }) {
      const selectedDate = ref(props.value);
      const datePickerFormat = ref(props.format);
  
      const onDateChange = (date) => {
        selectedDate.value = date;
        emit('update:value', date);
      };
  
      return {
        selectedDate,
        datePickerFormat,
        onDateChange,
      };
    },
  };
  </script>

<style>
  .v3dp__datepicker{
    @apply relative z-10;
  }
  .v3dp__input_wrapper{
    @apply border rounded ;
  }
  .v3dp__input_wrapper input{
    @apply w-full outline-none border-0 bg-transparent text-sm  pl-9 pr-2 block py-2;
  }
  
</style>