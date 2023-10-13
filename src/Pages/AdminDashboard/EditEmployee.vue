<template>
    <AdminLayout>

                <!-- <div class="flex justify-between items-end pb-12 pt-14">
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
                </div> -->




                <div class="mt-12">

                    <div class="border rounded-lg py-7 px-8">
                        <div class="flex justify-between">
                            <form v-on:submit.prevent="submitForm" ref="form" name="form">
                                
                                <div class="leaveBox">
            <div class="leaveRightBox">
                <div class="leaveRightTop">
                    
                </div>
                <div v-if="errormessage1 != ''" class="errormessage">
                    {{ errormessage1 }}
                </div>
                <div v-if="successmessage1 != ''" class="successmessage">
                    {{ successmessage1 }}
                </div>
                
                <div class="addNewBox" v-for="(data, index) in formList" :key="index">
                    <!-- <p>{{ data }}</p> -->
                    
                    <div class="addNewSub" v-for="(item, index) in data.items" :key="index">
                        <!-- <p>{{ item }}</p> -->

                        
                        <div class="addNewFirst adnright" v-if="item.name == 'First Name' && item.status == true">
                        <!-- <div class="addNewFirst adnright" v-if="item.name == 'First Name' && item.status == true"> -->
                            <label>First Name:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.fname.$error }" v-model="state3.fname" placeholder="First Name">
                            <span class="error-span" v-if="v3$.fname.$error">Please Enter First Name</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Last Name' && item.status == true">
                            <label>Last Name:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.lname.$error }" v-model="state3.lname" placeholder="Last Name">
                            <span class="error-span" v-if="v3$.lname.$error">Please Enter Last Name</span>
                        </div>

                        <div class="addNewFirst adnleft" v-if="item.name == 'Gender' && item.status == true">
                            <label>Gender:</label>
                                <select v-model="state3.gender">
                                    <option value="undefined" disabled>-Select One-</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Date of Birth' && item.status == true">
                            <label>Date of Birth:</label>
                             <!-- <input class="addNewInput" type="text" placeholder="DOJ"> -->
                             <!-- <input class="addNewInput" type="date" :class="{ filderror: v3$.doj.$error }" v-model="state3.doj" placeholder="DOJ"> -->
                             <datepicker class="addNewInput"  :class="{ filderror: v3$.dob.$error }" v-model="state3.dob" :disabledDates="(date) => date <= new Date()" placeholder="DOB"/>
                             <span class="error-span" v-if="v3$.dob.$error">Please Enter Date of Birth</span>
                        </div>

                        <div class="addNewFirst adnleft" v-if="item.name == 'Nationality' && item.status == true">
                            <label>Country:</label>
                                <select v-model="state3.country">
                                    <option value="undefined" disabled>-Select One-</option>
                                    <option value="USA">USA</option>
                                    <option value="India">India</option>
                                </select>
                        </div>

                        <div class="addNewFirst adnleft" v-if="item.name == 'Marital Status' && item.status == true">
                            <label>Marital Status:</label>
                                <select v-model="state3.married">
                                    <option value="undefined" disabled>-Select One-</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Email' && item.status == true">
                            <label>Email:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.email.$error }" v-model="state3.email" placeholder="Enter email">
                            <span class="error-span" v-if="v3$.email.$error">Please Enter Email</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Phone' && item.status == true">
                            <label>Phone:</label>
                            <input class="addNewInput" type="number" :class="{ filderror: v3$.phone.$error }" v-model="state3.phone" placeholder="Phone">
                            <span class="error-span" v-if="v3$.phone.$error">Please Enter Phone</span>
                        </div>

                        


                    <!-- </div> -->
                    <div class="addNewSub" >

                        <div class="addNewFirst adnright" v-if="item.name == 'Employee ID' && item.status == true">
                            <label>Employee Id:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.empid.$error }" v-model="state3.empid" placeholder="EMP ID">
                            <span class="error-span" v-if="v3$.empid.$error">Please Enter EMP ID</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Job Title/Position' && item.status == true">
                            <label>Job Title:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.jobtitle.$error }" v-model="state3.jobtitle" placeholder="Job Title">
                            <span class="error-span" v-if="v3$.jobtitle.$error">Please Enter Job Title</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Date of Joining' && item.status == true">
                            <label>Date of Joining:</label>
                            <!-- <input class="addNewInput" type="text" placeholder="DOJ"> -->
                            <!-- <input class="addNewInput" type="date" :class="{ filderror: v3$.doj.$error }" v-model="state3.doj" placeholder="DOJ"> -->
                            <datepicker class="addNewInput"  :class="{ filderror: v3$.doj.$error }" v-model="state3.doj" placeholder="DOJ"/>
                            <span class="error-span" v-if="v3$.doj.$error">Please Enter Date of Joining</span>
                        </div>

 
                        <div class="addNewFirst adnright" v-if="item.name == 'Department/Division' && item.status == true">
                            <label>Department:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.dept.$error }" v-model="state3.dept" placeholder="Department">
                            <span class="error-span" v-if="v3$.dept.$error">Please Enter Department</span>
                        </div>
                        <div class="addNewFirst adnleft" v-if="item.name == 'Supervisor/Manager Name' && item.status == true">
                            <label>Reporting Manager:</label>
                                <select v-model="state3.reporting_manager">
                                    <option value="undefined" disabled>-Select One-</option>
                                    <option value="Sumit Santra">Sumit Santra</option>
                                    <option value="Dipak Tewary">Dipak Tewary</option>
                                </select>
                        </div>
                        </div>

                        <div class="addNewSub">

                        <div class="addNewFirst adnright" v-if="item.name == 'Salary/Wage' && item.status == true">
                            <label>Gross Salary:</label>
                            <input class="addNewInput" type="number" :class="{ filderror: v3$.gross_salary.$error }" v-model="state3.gross_salary" placeholder="Gross Salary">
                            <span class="error-span" v-if="v3$.gross_salary.$error">Gross Salary</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Bank Account Number' && item.status == true">
                            <label>Bank Account Number:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.acc_number.$error }" v-model="state3.acc_number" placeholder="Bank A/C Number">
                            <span class="error-span" v-if="v3$.acc_number.$error">Please Enter Bank A/C Number</span>
                        </div>
                        <div class="addNewFirst adnright" v-if="item.name == 'Pan Number' && item.status == true">
                            <label>PAN Number:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.pan.$error }" v-model="state3.pan" placeholder="PAN Number">
                            <span class="error-span" v-if="v3$.pan.$error">Please Enter Department</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Benifit Related Documents' && item.status == true">
                            <label>Upload Benifit Related Documents(If Any):</label>
                            <input type="file"  class="addNewInput" @change="updateBenifitDoc">
                        </div>
                        </div>

                        <div class="addNewSub">

                        <div class="addNewFirst adnleft" v-if="item.name == 'Highest Education Level' && item.status == true">
                            <label>Highest Education Level:</label>
                                <select v-model="state3.edu_level">
                                    <option value="undefined" disabled>-Select One-</option>
                                    <option value="B.Tech">B.Tech</option>
                                    <option value="BSC">BSC</option>
                                    <option value="M.Tech">M.Tech</option>
                                    <option value="MSC">MSC</option>
                                    <option value="Other">Other</option>
                                </select>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'School/Institution Name' && item.status == true">
                            <label>School/Institution Name:</label>
                            <input class="addNewInput" type="text" :class="{ filderror: v3$.institution_name.$error }" v-model="state3.institution_name" placeholder="School/Institution Name">
                            <span class="error-span" v-if="v3$.institution_name.$error">School/Institution Name</span>
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Degree/Certificate Obtained' && item.status == true">
                            <label>Upload Highest Educational Certificate:</label>
                            <input type="file"  class="addNewInput" @change="updateEducationalDoc">
                        </div>

                        </div>



                        <div class="addNewSub">

                        <div class="addNewFirst adnright" v-if="item.name == 'Previous Employers' && item.status == true">
                        <label>Previous Employer:</label>
                        <input class="addNewInput" type="text" :class="{ filderror: v3$.prev_emp.$error }" v-model="state3.prev_emp" placeholder="Previous Employer">
                        <span class="error-span" v-if="v3$.prev_emp.$error">Previous Employer</span>
                        </div>


                        <div class="addNewFirst adnleft" v-if="item.name == 'Relevant Skills' && item.status == true">
                        <label>Relevent skills:</label>

                        <input
                        v-model="newTag"
                        @keydown.enter.prevent="addTag"
                        @blur="addTag"
                        :placeholder="selectedTags.length ? '' : 'Type or select a tag'"
                        ref="tagInput"
                        />
                        <div class="selected-tags">
                        <span
                        v-for="(tag, index) in selectedTags"
                        :key="index"
                        class="tag"
                        >
                        {{ tag }}
                        <button @click="removeTag(index)">x</button>
                        </span>
                        </div>
                        </div>


                        <div class="addNewFirst adnright" v-if="item.name == 'Upload Certificates' && item.status == true">
                            <label>Upload Certificates:</label>
                            <input type="file"  class="addNewInput" @change="updateJobExperience">
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Relevant Work Experience' && item.status == true">
                        <label>Job Experience (In Years):</label>
                        <input class="addNewInput" type="number" :class="{ filderror: v3$.job_exp_years.$error }" v-model="state3.job_exp_years" placeholder="Job Experience">
                        <span class="error-span" v-if="v3$.job_exp_years.$error">Job Experience</span>
                        </div>

                        </div>



                    <!-- <div class="addNewSub" v-for="(item, index) in data.items" :key="index"> -->
                        <div class="addNewFirst adnright" v-if="item.name == 'Resume/CV' && item.status == true">
                            <label>Upload CV:</label>
                            <input type="file"  class="addNewInput" @change="updateCV">
                        </div>

                        <div class="addNewFirst adnright" v-if="item.name == 'Identification Documents' && item.status == true">
                            <label>Upload ID Proof:</label>
                            <input type="file"  class="addNewInput" @change="updateID">
                        </div>
                    </div>




    
    
                    <div class="main-error-msg" v-if="errormessage || successmessage" :class="errormessage ? '' : 'suce-area'">
                        <h5 :class="{show:errormessage}" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg> {{errormessage}}</h5> 
                        <h5 :class="{show:successmessage}" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg> {{successmessage}}</h5> 
                    </div>
                </div>

                <div class="frg__addNewSub">
                    <!-- <router-link to="/dashboard/2" class="sty-bbt">Back</router-link> -->
                    <button class="sty-bbt" :disabled="buttonclick">Update</button>
                </div>
                
            </div>
        </div>

    </form>
                        </div>



                    </div>


                    
                    

                </div>
                
        <AdminSettingModal/>
    </AdminLayout>
</template>


<script>
    import AdminLayout from './AdminLayout.vue';
    import AdminSettingModal from '../../components/AdminSettingModal.vue';
    // import moment from 'moment';
    // import DropDown from '../../components/DropDown.vue';
    // import DatePickerDate from '../../components/DatePickerDate.vue';
    // import { ChevronRightIcon} from '@heroicons/vue/24/solid';
    // import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
    import { reactive, computed } from "vue"
    import useValidate from "@vuelidate/core"
    import { required, email, minLength, maxLength } from "@vuelidate/validators"
    // import { reactive } from "vue";
    import { BASE_URL } from "../../config";
    import axios from "axios";
    import { createLocal } from 'the-storages';
    import Datepicker from 'vue3-datepicker';
    import { createToast } from 'mosha-vue-toastify';

    
    const mirror = createLocal();
    const storage = mirror._prx;

    export default {
        name: 'EditEmployee',
        components:{
            AdminLayout,
            AdminSettingModal,
            Datepicker
            // DropDown,
            // DatePickerDate,
            // ChevronDownIcon,
            // ArrowDownTrayIcon,
            // ChevronRightIcon,
            // TabGroup,
            // TabList,
            // Tab,
            // TabPanels,
            // TabPanel

        },

        setup() {
          const state3 = reactive({
              fname: '',
              lname:'',
              email: '',
              phone: '',
              doj: new Date(),
              dob: new Date(),
              designation:'',
              casual:'',
              sick:'',
              blood:'',
              address:'',
              message:'',
              empid:'',
              jobtitle:'',
              dept:'',
              gross_salary:'',
              acc_number:'',
              pan:'',
              institution_name:'',
              prev_emp:'',
              job_exp_years:'',
              
          })
    
          const rules3 = computed(() => {
              return {
                  fname: { required },
                  lname: { required },
                  email: { required,email },
                  phone: { required, minLength: minLength(10), maxLength: maxLength(12) },
                //   message: { required },
                  doj:{ required },
                  dob:{ required },
                  empid:{ required },
                //   designation:{ required },
                  jobtitle:{ required },
                  dept:{ required },
                  gross_salary:{ required },
                  acc_number:{ required },
                  pan:{ required },
                  institution_name:{ required },
                  prev_emp:{ required },
                  job_exp_years:{ required },
                //   casual:{ required },
                //   sick:{ required }
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
              form: {
                  fname: '',
                  lname:'',
                  email: '',
                  phone: '',
                  message:'',
                  doj:'',
                  dob:'',
                  designation:'',
                  casual:'',
                  sick:'',
                  photo: {}
              },
              errormessage: '',
              successmessage: '',
              errormessage1: '',
              successmessage1: '',
              files: "",
              type:"",
            //   state3: {},
              buttonclick:false,
              previewFile: null,
              previewUrl: null,
              dept: undefined,
              formList:[],
              storage: storage,
              benifitdoc:'',
              edudoc:'',
              selectedTags: [], 
              newTag: '', 
              availableTags: ['Tag 1', 'Tag 2', 'Tag 3', 'Tag 4'],
              jobexpdoc:'',
              iddoc:'',
              cvdoc:'',
              url_data:''
          }
      },
        computed:{
 

        
        },

        async created(){
            await axios.post(BASE_URL + '/fetchemployeemasterdetails',{'company_id':this.storage.company_id})
                    .then((response)=>{
                        console.log(response.data);
                        if (response.data.formdetails != false) {
                            this.formList = response.data.formdetails
                        }
                        console.log(this.formList);
                    })


        this.url_data = this.$route.params.id;
        console.log("urdata", this.url_data);

        await axios.post(BASE_URL + '/fetcheditempdetails',{'company_id':this.storage.company_id, 'empid': this.url_data})
                    .then((response)=>{
                        console.log(response.data);
                        if (response.data.formdetails != false) {
                            var empdata = response.data.empdataforedit
                            console.log("empdata",empdata);
                            this.state3.fname = empdata.fname
                            this.state3.lname = empdata.lname
                            this.state3.gender = empdata.gender
                            this.state3.dob   = new Date(empdata.dob_datepicker)
                            this.state3.country = empdata.country
                            this.state3.married = empdata.married
                            this.state3.email = empdata.email
                            this.state3.phone = empdata.phone
                            this.state3.empid = empdata.empid
                            this.state3.jobtitle = empdata.jobtitle
                            this.state3.doj = new Date(empdata.doj_datepicker)
                            // this.state3.doj = empdata.doj_datepicker
                            this.state3.dept = empdata.dept
                            this.state3.reporting_manager = empdata.reporting_manager
                            this.state3.gross_salary = empdata.gross_salary
                            this.state3.acc_number = empdata.acc_number
                            this.state3.pan = empdata.pan
                            this.state3.edu_level = empdata.edu_level
                            this.state3.institution_name = empdata.edu_institue
                            this.state3.prev_emp = empdata.prev_employer
                            this.state3.job_exp_years = empdata.jobexperience
                            console.log("tags",empdata.emp_skills.split(','));

                            this.selectedTags = empdata.emp_skills.split(',')
                            // this.state3.job_exp_years = empdata.jobexperience
                        }
                        console.log(this.formList);
                    })

        },

        methods:{
            updateBenifitDoc(event){
                this.benifitdoc = event.target.files[0];
                console.log("benifitdoc",this.benifitdoc);
            },

            updateEducationalDoc(event){
                this.edudoc = event.target.files[0];
                console.log("edudoc",this.edudoc);
            },

            updateJobExperience(event){
                this.jobexpdoc = event.target.files[0];
                console.log("jobexpdoc",this.jobexpdoc);
            },

            updateCV(event){
                this.cvdoc = event.target.files[0];
                console.log("cvdoc",this.cvdoc);
            },

            updateID(event){
                this.iddoc = event.target.files[0];
                console.log("iddoc",this.iddoc);
            },

            addTag() {
                if (this.newTag.trim() !== '') {
                    // Check if the entered tag is already in the list of available tags
                    const tagExists = this.availableTags.includes(this.newTag);

                    // If the tag doesn't exist, add it to the list of selected tags
                    if (!tagExists) {
                    this.selectedTags.push(this.newTag);
                    console.log("jfyugfyug",this.selectedTags);
                    }

                    // Clear the input field
                    this.newTag = '';

                    // Focus on the input field again
                    // this.$refs.tagInput.focus();
                }
            },

            removeTag(index) {
             this.selectedTags.splice(index, 1);
            },

            async submitForm(){
                
            this.buttonclick = true;
            this.v3$.$validate()
            console.log("uuidgdygd", this.storage.company_id);
            if (!this.v3$.$error) {
                this.buttonclick = false;
                console.log("ldhuigduy",this.state3.doj);
                if (this.state3.dob != '') {
                    var dob_month = this.state3.dob.getMonth()+1;
                    var dob_year = this.state3.dob.getFullYear().toString();
                    var dob_date = this.state3.dob.getDate();
                    var dob_month_string = dob_month.toLocaleString().padStart(2, '0');
                    // var dob_year_string = dob_year.toLocaleString();
                    var dob_date_string = dob_date.toLocaleString().padStart(2, '0');
        
                    console.log("dob_year",dob_year);
                    // console.log("dob-date2",dob_year_string );
                    console.log("dob_month_string",dob_month_string);
                    console.log("dob_date_string",dob_date_string);
                    var formatted_dob = dob_year.concat("-",dob_month_string).concat("-",dob_date_string);
                    console.log("formatted_dob",formatted_dob);
                }else{
                    formatted_dob = null;
                }

                if (this.state3.doj != '') {
                    var doj_month = this.state3.doj.getMonth()+1;
                    var doj_year = this.state3.doj.getFullYear().toString();
                    var doj_date = this.state3.doj.getDate();
                    var doj_month_string = doj_month.toLocaleString().padStart(2, '0');
                    // var doj_year_string = doj_year.toLocaleString();
                    var doj_date_string = doj_date.toLocaleString().padStart(2, '0');
        
                    console.log("doj-date1",doj_month_string);
                    // console.log("doj-date2",doj_year_string );
                    console.log("doj-date3",doj_date_string);
                    var formatted_doj = doj_year.concat("-",doj_month_string).concat("-",doj_date_string);
                    console.log("formatted_doj",formatted_doj);
                }else{
                    formatted_doj = null;
                }



                let formData = new FormData();
    
                formData.append('company_id',this.storage.company_id);
                formData.append('fname', this.state3.fname);
                formData.append('lname', this.state3.lname);
                formData.append('gender', this.state3.gender);
                formData.append('dob', formatted_dob);
                formData.append('dob_datepicker', this.state3.dob);
                formData.append('country', this.state3.country);
                formData.append('married', this.state3.married);
                formData.append('empid', this.state3.empid);
                formData.append('doj', formatted_doj);
                formData.append('doj_datepicker', this.state3.doj);
                formData.append('jobtitle', this.state3.jobtitle);
                formData.append('dept', this.state3.dept);
                formData.append('reporting_manager', this.state3.reporting_manager);
                formData.append('gross_salary', this.state3.gross_salary);
                formData.append('acc_number', this.state3.acc_number);
                formData.append('pan', this.state3.pan);
                formData.append('benifitdoc', this.benifitdoc);
                formData.append('edu_level', this.state3.edu_level);
                formData.append('edu_institue', this.state3.institution_name);
                formData.append('edu_certificate', this.state3.edudoc);
                formData.append('prev_employer', this.state3.prev_emp);
                formData.append('emp_skills', this.selectedTags);
                formData.append('experience_certificate', this.jobexpdoc);
                formData.append('jobexperience', this.state3.job_exp_years);
                formData.append('emp_cv', this.state3.cvdoc);
                formData.append('emp_id_doc', this.state3.iddoc);
                formData.append('email', this.state3.email);
                formData.append('phone', this.state3.phone);
                formData.append('employeeid', this.url_data);



                console.log("formdata", formData);

                await axios.post(BASE_URL + '/updateempdetails',formData)
                    .then((response)=>{
                        console.log(response);
                        this.tostMessage(response.data.success, response.data.message);

                    })
            }
            else{
                this.buttonclick = false;

                console.log("bdygfyduf");
            }
   
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


        }
        

    }


</script>

<style>
.tag-input {
  display: flex;
  align-items: center;
}
.selected-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}
.tag {
  background-color: #0074d9;
  color: #ffffff;
  padding: 4px 8px;
  border-radius: 4px;
  display: flex;
  align-items: center;
}
.tag button {
  background: none;
  border: none;
  color: #ffffff;
  font-weight: bold;
  margin-left: 4px;
  cursor: pointer;
}
.tag-input input {
  flex-grow: 1;
}

</style>