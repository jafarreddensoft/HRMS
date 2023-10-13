<template>
    <div class="flex justify-center items-center max-h-screen p-20">
        <div class="pt-16">
            <h1 class="font-semibold text-4xl text-neutral-900">Sign In</h1>
            <p class="text-base text-neutral-500 pt-2">Please wait while we verify your email address...</p>
        </div>
        
        
    </div>
</template>


<script>

    import { BASE_URL } from "../../config";
    import axios from "axios";
    import { reactive, computed } from "vue";
    import useValidate from "@vuelidate/core";
    import { required , email} from "@vuelidate/validators";
    import { createToast } from 'mosha-vue-toastify';
    import 'mosha-vue-toastify/dist/style.css';


    export default {
        name: 'VerifyEmail',

        setup() {
          const state3 = reactive({

              email: '',
              password:''
          })
    
          const rules3 = computed(() => {
              return {

                  email: { required, email },
                  password:{ required}

              }
          })
          const v3$ = useValidate(rules3, state3)
    
          return {
              state3,
              v3$
          }
      },

        data() {
            return {
                btnLoader: false,
            }
        },

        methods: {
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

  },
  async mounted() {

    const verificationToken = this.$route.params.id;
    console.log(verificationToken);
    await axios.post(BASE_URL + '/verifyYourEmail',{'token':verificationToken})
        .then((response)=>{
            console.log(response.data);
            this.tostMessage(response.data.success, response.data.message);
            if(response.data.success == 'success'){
                window.location.href = "/login";
            }
        })
  }

    }


</script>