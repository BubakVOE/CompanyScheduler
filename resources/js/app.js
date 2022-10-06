
require('./bootstrap');


import { createApp } from 'vue';





import { Photoshop } from "vue-color";

import Swal from "sweetalert2";

window.Swal = Swal

// import { LaravelVuePagination } from "laravel-vue-pagination";

import { Axios } from "axios";
import Toast from "vue-toastification";
import { Bar } from 'vue-chartjs'
import { Doughnut } from "vue-chartjs";


//dashboard
    // import sideBarDashboard from "./components/dashboard/sideBarDashboard.vue";

    //header
    import Dashboard from "./components/dashboard/header/Dashboard.vue";
    import DashboardGraph from "./components/dashboard/header/DashboardGraph.vue";
    import DashboardDoughnut from "./components/dashboard/header/DashboardDoughnut.vue";

    //sections
    import bladeCreateProcess from "./components/dashboard/section/bladeCreateProcess.vue"
    import bladeCompanies from "./components/dashboard/section/bladeCompanies.vue";
    import bladeProjects from "./components/dashboard/section/bladeProjects.vue";
    import bladeEmployee from "./components/dashboard/section/bladeEmployee.vue";
    import bladeJobs from "./components/dashboard/section/bladeJobs.vue"
    import projectsOfCompany from "./components/dashboard/section/projectsOfCompany";

    //others
    import bladePDF from "./components/dashboard/other/bladePDF.vue";
    import bladeBackup from "./components/dashboard/other/bladeBackup.vue";
    import bladeActivity from "./components/dashboard/other/bladeActivity.vue";
    import bladeAuthentication from "./components/dashboard/other/bladeAuthentication.vue";

//employee

import bladeProfile from "./components/employee/bladeProfile.vue";
import bladeRecords from "./components/employee/bladeRecords.vue";
import bladeSettings from "./components/employee/bladeSettings.vue";



import EmployeeInfo from "./components/employee/other/EmployeeInfo";
import EmployeeCard from "./components/employee/other/EmployeeCard";
import WorkAddRecord from "./components/employee/other/WorkAddRecord";

import ProfileBarGraph from "./components/employee/other/ProfileBarGraph.vue";


import TestIndex from "./components/TestIndex.vue";


const app = createApp({})

// app.component('pagination', LaravelVuePagination);

app.component('test-index', TestIndex);

//dashboard
    //header
    app.component("Dashboard", Dashboard);
    app.component("dashboard-graph", DashboardGraph);
    app.component("dashboard-doughnut", DashboardDoughnut);

    //sections
    app.component('blade-create-process', bladeCreateProcess);
    app.component("blade-companies", bladeCompanies);
    app.component("blade-projects", bladeProjects);
    app.component("blade-employee", bladeEmployee);
    app.component('blade-jobs', bladeJobs);
    app.component('projects-of-company', projectsOfCompany);

    //others
    app.component('blade-pdf', bladePDF);
    app.component('blade-backup', bladeBackup);
    app.component('blade-activity', bladeActivity);
    app.component('blade-authentication', bladeAuthentication);

//employee
    app.component('blade-profile', bladeProfile);
    app.component('blade-records', bladeRecords);
    app.component('blade-settings', bladeSettings);

    app.component('employee-info', EmployeeInfo);
    app.component('employee-card', EmployeeCard);
    app.component('work-add-record', WorkAddRecord);
    app.component('profile-bar-graph', ProfileBarGraph);





app.component('photoshop', Photoshop);

app.mount('#app')