
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
    import bladeDashboard from "./components/dashboard/header/bladeDashboard.vue";
    import DashboardGraph from "./components/dashboard/header/DashboardGraph.vue";
    import DashboardDoughnut from "./components/dashboard/header/DashboardDoughnut.vue";

    //sections
    import bladeProcess from "./components/dashboard/section/bladeProcess.vue"
    import bladeCompanies from "./components/dashboard/section/bladeCompanies.vue";
    import bladeProjects from "./components/dashboard/section/bladeProjects.vue";
    import bladeEmployee from "./components/dashboard/section/bladeEmployee.vue";
    import bladeJobs from "./components/dashboard/section/bladeJobs.vue"
    import bladeProjectsOfCompany from "./components/dashboard/section/bladeProjectsOfCompany";

    //others
    import bladePDF from "./components/dashboard/other/bladePDF.vue";
    import bladeBackup from "./components/dashboard/other/bladeBackup.vue";
    import bladeActivity from "./components/dashboard/other/bladeActivity.vue";
    import bladeAuthentication from "./components/dashboard/other/bladeAuthentication.vue";

//employee

import bladeOverall from "./components/employee/header/bladeOverall.vue";
import bladeRecords from "./components/employee/section/bladeRecords.vue";
import bladeSettings from "./components/employee/other/bladeSettings.vue";



import WorkAddRecord from "./components/employee/section/WorkAddRecord";

import profileBarGraph from "./components/employee/header/profileBarGraph.vue";


import TestIndex from "./components/TestIndex.vue";


const app = createApp({})

// app.component('pagination', LaravelVuePagination);

app.component('test-index', TestIndex);

//dashboard
    //header
    app.component("blade-dashboard", bladeDashboard);
    app.component("dashboard-graph", DashboardGraph);
    app.component("dashboard-doughnut", DashboardDoughnut);

    //sections
    app.component('blade-process', bladeProcess);
    app.component("blade-companies", bladeCompanies);
    app.component("blade-projects", bladeProjects);
    app.component("blade-employee", bladeEmployee);
    app.component('blade-jobs', bladeJobs);
    app.component('projects-of-company', bladeProjectsOfCompany);

    //others
    app.component('blade-pdf', bladePDF);
    app.component('blade-backup', bladeBackup);
    app.component('blade-activity', bladeActivity);
    app.component('blade-authentication', bladeAuthentication);

//employee
    app.component('blade-overall', bladeOverall);
    app.component('blade-records', bladeRecords);
    app.component('blade-settings', bladeSettings);

    app.component('work-add-record', WorkAddRecord);
    app.component('profile-bar-graph', profileBarGraph);





app.component('photoshop', Photoshop);

app.mount('#app')