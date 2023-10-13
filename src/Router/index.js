import { createRouter, createWebHistory } from "vue-router";
import Login from "../Pages/Auth/Login.vue";
import HomePage from "../Pages/index.vue";
import SignUp from "../Pages/Auth/SignUp.vue";
import Dashboard from "../Pages/AdminDashboard/Dashboard.vue";
import BasicForm from "../Pages/AdminDashboard/BasicForm.vue";
import Addnewemployee from "../Pages/AdminDashboard/Addemployee.vue";
import VerifyEmail from "../Pages/Auth/verifyemail.vue";
import AddEmployeeMaster from "../Pages/AdminDashboard/AddEmployeeMaster.vue";
import EmployeeDashboard from "../Pages/AdminDashboard/EmployeeDashboard.vue";


const routes = [
    {
        name: "HomePage",
        component: HomePage,
        path: "/",
    },
    {
        name: "LogIn",
        component: Login,
        path: "/login",
    },
    {
        name: "SignUp",
        component: SignUp,
        path: "/sign-up",
    },
    {
        name: "AdminDashboard",
        component: Dashboard,
        path: "/dashboard/:id",
    },
    {
        name: "BasicForm",
        component: BasicForm,
        path: "/basicform/:id",
    },
    {
        name: "Add-new-employee",
        component: Addnewemployee,
        path: "/addemployee",
    },
    {
        name: "VerifyEmail",
        component: VerifyEmail,
        path: "/verifyYourEmail/:id",
    },
    {
        name: "AddEmployeeMaster",
        component: AddEmployeeMaster,
        path: "/addemployeemaster",
    },
    
    {
        name: "EmployeeDashboard",
        component: EmployeeDashboard,
        path: "/employee-dashboard/:id",
    },
    
    
]


const router = createRouter({
    mode: "history",
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "active", 
    linkExactActiveClass: "active", 
  });
  
  export default router;