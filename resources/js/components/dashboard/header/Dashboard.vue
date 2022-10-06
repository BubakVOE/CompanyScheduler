<template>

    <!--  CONTENT  -->
    <div class="container p-4 shadow-lg rounded-3">

        <header class="pb-3 mb-4 border-bottom ">
            <div class="d-flex align-items-center text-dark text-decoration-none">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-columns-gap" viewBox="0 0 16 16">
                    <path
                        d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                </svg>

                <span class="fs-4 ms-2">Dashboard</span>
            </div>
        </header>

        <!-- Data -->
        <div class="py-5 row g-4 row-cols-1 row-cols-lg-5">

            <div class="col">
                <div class="d-flex flex-column align-items-center justify-content-center card px-5 pt-5">
                    <div class="d-flex align-items-center justify-content-center w-50 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                            <path
                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 text-center pt-3 pb-3 border-bottom w-100">
                        {{ companies_count }}
                    </h3>
                    <a href="/dashboard/companies" class="text-center text-secondary pb-2">
                        Společností
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="d-flex flex-column align-items-center justify-content-center card px-5 pt-5">
                    <div class="d-flex align-items-center justify-content-center w-50 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </div>

                    <h3 class="fs-2 text-center pt-3 pb-3 border-bottom w-100">
                        {{ projects_count }}
                    </h3>

                    <a href="/dashboard/projects" class="text-center text-secondary pb-2">
                        Projekty
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="d-flex flex-column align-items-center justify-content-center card px-5 pt-5">
                    <div class="d-flex align-items-center justify-content-center w-50 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </div>

                    <h3 class="fs-2 text-center pt-3 pb-3 border-bottom w-100">
                        {{ users_count }}
                    </h3>

                    <a href="/dashboard/employees" class="text-center text-secondary pb-2">
                        Zaměstnanci
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="d-flex flex-column align-items-center justify-content-center card px-5 pt-5">
                    <div class="d-flex align-items-center justify-content-center w-50 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-briefcase" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 text-center pt-3 pb-3 border-bottom w-100">
                        {{ works_count }}
                    </h3>

                    <a href="/dashboard/jobs" class="text-center text-secondary pb-2">
                        Práce
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="d-flex flex-column align-items-center justify-content-center card px-5 pt-5">
                    <div class="d-flex align-items-center justify-content-center w-50 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-cloud-download" viewBox="0 0 16 16">
                            <path
                                d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                            <path
                                d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                        </svg>
                    </div>

                    <h3 class="fs-2 text-center pt-3 pb-3 border-bottom w-100">
                        {{ db_count }}
                    </h3>

                    <a href="/dashboard/back_ups" class="text-center text-secondary pb-2">
                        Databáze
                    </a>
                </div>
            </div>

        </div>

        <!-- VÝDAJE -->
        <div class="py-5">
            <div class="row">
                <div class="col">
                    <h1 class="text-uppercase text-left fw-bolder">
                        Výdaje
                        <span class="fw-lighter text-lowercase">(dohromady)</span>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col" style="min-width: 250px;">
                    <div class="card card-statistics">
                        <div class="card-body bg-white">
                            <h3 class="fw-bolder text-uppercase mb-3 text-left text-md-center text-xl-left">
                                Týdně
                            </h3>

                            <div
                                class="mb-3 d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-around">
                                <div class="float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                        class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path
                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                        <path
                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </div>
                                <div class="float-right">
                                    <div class="fluid-container">
                                        <h3 class="font-weight-medium text-right mb-0 text-danger">
                                            {{ week_earns }},-
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col" style="min-width: 250px;">
                    <div class="card card-statistics">
                        <div class="card-body bg-white">
                            <h3 class="fw-bolder text-uppercase mb-3 text-left text-md-center text-xl-left">
                                Měsíčně
                            </h3>
                            <div
                                class="mb-3 d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-around">
                                <div class="float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                        class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path
                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                        <path
                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </div>
                                <div class="float-right">
                                    <div class="fluid-container">
                                        <h3 class="font-weight-medium text-right mb-0 text-danger">
                                            {{ month_earns }},-
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col" style="min-width: 250px;">
                    <div class="card card-statistics">
                        <div class="card-body bg-white">
                            <h3 class="fw-bolder text-uppercase mb-3 text-left text-md-center text-xl-left">
                                Ročně
                            </h3>

                            <div
                                class="mb-3 d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-around">
                                <div class="float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                        class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path
                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                        <path
                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </div>
                                <div class="float-right">
                                    <div class="fluid-container">
                                        <h3 class="font-weight-medium text-right mb-0 text-danger">
                                            {{ year_earns }},-
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GRAFICKY (doughnut) -->
        <div class="py-5">

            <h1 class="text-uppercase text-left fw-bolder">
                Graficky
                <span class="fw-lighter text-lowercase">(výdaje společností)</span>
            </h1>


            <div class="row">
                <div class="col w-50 h-50">
                    <dashboard-doughnut :doughnut_data="doughnut_data"></dashboard-doughnut>
                </div>

                <div class="col ">

                    <div>
                        Vyber společnosti, které chceš zobrazit
                    </div>

                    <template v-for="company in companies">
                        <div>
                            <input type="checkbox" :value="company.name" v-model="checked_names"
                                @change="getCompaniesData(checked_names)" />
                            <label>
                                {{ company . name }} <br>
                            </label>
                        </div>
                    </template>

                </div>

                <div class="col">
                    <template v-for="data in doughnut_data">
                        {{ data }} <br>
                    </template>
                </div>
            </div>
        </div>

        <!-- GRAFICKY (spojnicový) -->
        <div class="py-5">
            <div class="d-flex align-items-center justify-content-between align-items-center">
                <h1 class="text-uppercase text-left fw-bolder">
                    Graficky
                    <span class="fw-lighter text-lowercase">(odpracované hodiny)</span>

                </h1>

                <select class="btn btn-sm btn-outline-secondary dropdown-toggle" @change="getHoursPerDate()"
                    v-model="select_date">
                    <option value="week">
                        Týden
                    </option>
                    <option value="month">
                        Měsíc
                    </option>
                    <option value="year">
                        Rok
                    </option>
                </select>
            </div>

            <div class="bg-white">
                <dashboard-graph :graph_data="graph_data"></dashboard-graph>
            </div>
        </div>




    </div>

</template>

<script>
import DashboardGraph from "./DashboardGraph.vue";
import DashboardDoughnut from "./DashboardDoughnut.vue";

export default {
    name: "Dashboard",

    props: [
        "week_earns",
        "month_earns",
        "year_earns",

        "companies",

        "companies_count",
        "projects_count",
        "users_count",
        "works_count",
        "db_count",

    ],

    components: {
        DashboardGraph,
        DashboardDoughnut,
    },

    computed() {

    },

    data() {
        return {
            doughnut_data: {},

            graph_data: {},

            checked_names: [],

            select_date: "week",
        };
    },

    mounted() {
        this.getHoursPerDate();

        this.getCompaniesData();
    },

    methods: {
        getCompaniesData(checked_names) {
            let url = "/axios/dashboard/companies/data"

            axios
                .get(url, {
                    params: {
                        companies: checked_names
                    }
                })
                .then((response) => {
                    console.log(response.data)
                    this.doughnut_data = response.data
                })
        },

        getTest(checked_names) {
            let url = "dashboard/test";

            axios
                .get(url, {
                    params: {
                        companies: checked_names
                    }
                })
                .then((response) => {
                    console.log(response.data)
                })
        },

        //SelectDateController
        getHoursPerDate() {
            let url = "/axios/dashboard/selectdate/" + this.select_date;

            axios
                .get(url)
                .then((response) => {
                    this.graph_data = response.data;
                });
        },

    },
};
</script>

<style>

</style>
