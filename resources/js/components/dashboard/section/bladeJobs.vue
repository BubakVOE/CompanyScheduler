<template>
    <div>
        <div class="container py-4 shadow-lg rounded-3">
            <header class="pb-3 mb-4 border-bottom d-flex justify-content-between">
                <div class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                    </svg>

                    <span class="fs-4 ms-2">Práce</span>
                </div>

                <div class="bg bg-success rounded">
                    <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#createJob">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                            </path>
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                        </svg>
                        <span class="ms-2">
                            Přidat práci
                        </span>
                    </button>
                </div>
            </header>

            <div class="pb-3 mb-4 border-bottom d-grid  text-center">

                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-funnel" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                    </svg>
                    <span class="fs-4 ms-2">Filtr</span>
                </div>

                <div class="pt-5 pb-3 mb-4 d-flex justify-content-center align-items-center ">

                    <div class="d-grid ms-5 me-5">
                        <label class="mb-2">
                            společnost
                        </label>

                        <select v-model="company_id" @change="getJobs()">

                            <option value="all">
                                Všechny
                            </option>

                            <template v-for="company in companies">
                                <option :value="company.id">
                                    {{company.name}}
                                </option>
                            </template>
                        </select>

                    </div>

                    <div v-if="company_id !== 'all'" class="d-grid ms-5 me-5">
                        <label class="mb-2">
                            projekt
                        </label>

                        <select v-model="project_id" @change="getJobs()">
                            <option value="all">
                                všechny
                            </option>

                            <template v-for="project in projects_for_company">
                                <option :value="project.id">
                                    {{ project.name }}
                                </option>
                            </template>
                        </select>

                    </div>

                    <div v-if="project_id !== 'all'" class="d-grid ms-5 me-5">
                        <label class="mb-2">
                            uživatel
                        </label>

                        <select v-model="employee_id" @change="getJobs()">
                            <option value="all">
                                všechny
                            </option>

                            <template v-for="employee in employees">
                                <option :value="employee.id">
                                    {{ employee.last_name }} {{ employee.first_name }}
                                </option>
                            </template>
                        </select>

                    </div>


                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col" class="col-1 text-uppercase">
                                ID
                            </th>

                            <th scope="col" class="col-2 text-uppercase">
                                Projekt
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                Zaměstnanec
                            </th>

                            <th scope="col" class="col-2 text-uppercase">
                                Vykonaná práce
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                hodiny
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                kč/h
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                <h4>Datum</h4>
                                <small class="text-secondary">rok/měsíc/den</small>
                            </th>

                            <th class="col-4 text-uppercase">
                                Edit
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="job in jobs" :key="job" class="p-1 bg-white text-center">
                            <td class="fw-bolder">
                                {{ job . id }}
                            </td>

                            <td>
                                {{ job . project_name }}
                            </td>

                            <td>
                                {{ job . employee }}
                            </td>

                            <td>
                                {{ job . job }}
                            </td>

                            <td>
                                {{ job . hours }}
                            </td>

                            <td class="text-success">
                                {{ job . money_per_hour }},-
                            </td>


                            <td>
                                {{ job . date }}
                            </td>

                            <td>
                                <div class="d-flex flex-col justify-content-center items-align-content">

                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser"
                                        @click="userEdit(job)">
                                        Edit
                                    </button>

                                    <form @submit.prevent="deleteJob">
                                        <button class="btn btn-danger mx-2" @click="getJobId(job)">
                                            Smazat
                                        </button>
                                    </form>


                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- modal - ADD-->
        <div class="modal fade" id="createJob" tabindex="-1" aria-labelledby="createJob" aria-hidden="true">
            <div class="modal-dialog  modal-md">

                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center border-2 border-danger">
                        <h5 class="modal-title border-2 border-danger">
                            modal
                        </h5>

                        <h4 class="text-center d-flex justify-content-center mx-5">
                            Vytvořit nový záznam

                        </h4>
                        <button id="closeCreate" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form @submit.prevent="createJob">
                        <div class="modal-body p-5 col-12 container">

                            <div class="modal-body container row">

                                <div class="col d-grid">
                                    <label>
                                        Project
                                    </label>

                                    <select v-model="modal_create_job.project_id">
                                        <template v-for="project in projects">

                                            <option :value="project.id">
                                                {{ project . name }}
                                            </option>
                                        </template>
                                    </select>

                                    <template v-if="errors.project_id">
                                        <p v-for="error in errors.project_id"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>

                                </div>

                                <div class="col d-grid">
                                    <label>
                                        Uživatel
                                    </label>

                                    <select v-model="modal_create_job.user_id">
                                        <template v-for="user in users">

                                            <option :value="user.id">
                                                {{ user . last_name }} {{ user . first_name }}
                                            </option>
                                        </template>
                                    </select>

                                    <template v-if="errors.user_id">
                                        <p v-for="error in errors.user_id"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>

                                </div>
                            </div>

                            <div class="modal-body container ">
                                <label>
                                    Vykonaná práce
                                    <span class="text-danger fw-bolder">*</span>
                                </label>

                                <input type="text" class="form-control"  placeholder="Šternberk"
                                    v-model="modal_create_job.job">

                                <template v-if="errors.job">
                                    <p v-for="error in errors.job"
                                        class="alert alert-danger d-flex align-items-center" role="alert">
                                        {{ error }}
                                    </p>
                                </template>

                            </div>

                            <div class="d-flex justify-content-around modal-body container">
                                <div class="me-2">
                                    <label>
                                        Odpracované hodiny
                                    </label>

                                    <input type="text" class="form-control" placeholder="8"
                                        v-model="modal_create_job.hours">

                                    <template v-if="errors.hours">
                                        <p v-for="error in errors.hours"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>
                                </div>

                                <div class="ms-2">
                                    <label>
                                        Mzda na hodinu
                                    </label>

                                    <input type="text" class="form-control" placeholder="150"
                                        v-model="modal_create_job.money_per_hour">

                                    <template v-if="errors.money_per_hour">
                                        <p v-for="error in errors.money_per_hour"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>
                                </div>
                            </div>

                            <div class="modal-body container">
                                <label>
                                    Datum
                                    <span class="text-danger fw-bolder">*</span>
                                </label>

                                <input type="date" class="form-control" placeholder="Vybíralova 19/4"
                                    v-model="modal_create_job.date">

                                
                                <template v-if="errors.date">
                                    <p v-for="error in errors.date"
                                        class="alert alert-danger d-flex align-items-center" role="alert">
                                        {{ error }}
                                    </p>
                                </template>
                                
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Zavřít
                            </button>

                            <button type="submit" class="btn btn-success">
                                Uložit
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- modal - EDIT-->
        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
            <div class="modal-dialog  modal-md">

                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center border-2 border-danger">
                        <h5 class="modal-title border-2 border-danger">
                            modal
                        </h5>

                        <h4 class="text-center d-flex justify-content-center mx-5">
                            Editovat záznam

                        </h4>
                        <button id="closeEdit" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form @submit.prevent="updateJob">
                        <div class="modal-body p-5 col-12 container">

                            <div class="modal-body container row">

                                <div class="col d-grid">
                                    <label>
                                        Project
                                    </label>

                                    <select class="p-1" v-model="modal_edit_job.project_id">
                                        <template v-for="project in projects">

                                            <option :value="project.id">
                                                {{ project . name }}
                                            </option>
                                        </template>
                                    </select>

                                </div>

                                <div class="col d-grid">
                                    <label>
                                        Uživatel
                                    </label>

                                    <select class="p-1" v-model="modal_edit_job.user_id">
                                        <template v-for="user in users">

                                            <option :value="user.id">
                                                {{ user . last_name }} {{ user . first_name }}
                                            </option>
                                        </template>
                                    </select>

                                </div>
                            </div>

                            <div class="modal-body container ">
                                <label>
                                    Vykonaná práce
                                    <span class="text-danger fw-bolder">*</span>
                                </label>

                                <input type="text" class="form-control" placeholder="Šternberk"
                                    v-model="modal_edit_job.job">

                                <template v-if="update_errors.job">
                                    <p v-for="error in update_errors.job"
                                        class="alert alert-danger d-flex align-items-center" role="alert">
                                        {{ error }}
                                    </p>
                                </template>

                            </div>

                            <div class="d-flex justify-content-around modal-body container">
                                <div class="me-2">
                                    <label>
                                        Odpracované hodiny
                                    </label>

                                    <input type="text" class="form-control" placeholder="8"
                                        v-model="modal_edit_job.hours">

                                    <template v-if="update_errors.hours">
                                        <p v-for="error in update_errors.hours"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>
                                </div>

                                <div class="ms-2">
                                    <label>
                                        Mzda na hodinu
                                    </label>

                                    <input type="text" class="form-control" placeholder="150"
                                        v-model="modal_edit_job.money_per_hour">

                                    <template v-if="update_errors.money_per_hour">
                                        <p v-for="error in update_errors.money_per_hour"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>
                                </div>
                            </div>

                            <div class="modal-body">
                                <label>
                                    Datum (m/d/y)
                                    <span class="text-danger fw-bolder">*</span>
                                </label>

                                <input type="date" class="form-control"
                                    v-model="modal_edit_job.date">

                                <template v-if="update_errors.date">
                                    <p v-for="error in update_errors.date"
                                        class="alert alert-danger d-flex align-items-center" role="alert">
                                        {{ error }}
                                    </p>
                                </template>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Zavřít
                            </button>

                            <button type="submit" class="btn btn-success">
                                Uložit
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>






    </div>
</template>

<script>
export default {
    name: "bladeJobs",

    props: [
        'projects',
        'users',
    ],

    data() {
        return {
            errors: {},
            update_errors: {},

            companies: {},
            jobs: {},
            projects_for_company: {},
            employees: {},

            company_id: 'all',
            project_id: 'all',
            employee_id: 'all',

            modal_edit_job: {},

            modal_create_job: {},

        }
    },

    mounted() {
        this.getJobs()
    },

    methods: {

        getJobId(job) {
            this.get_job_id = job.id
        },

        userEdit(job) {
            this.modal_edit_job = job
        },

        getJobs() {


            let data = new FormData();

            data.append('company_id', this.company_id);
            data.append('project_id', this.project_id);
            data.append('employee_id', this.employee_id);

            let url = '/axios/dashboard/jobs/get_jobs'

            axios
                .post(url, data)
                .then((response) => {
                    this.companies = response.data.companies
                    this.jobs = response.data.jobs
                    this.projects_for_company = response.data.projects_for_company
                    this.employees = response.data.employees
                })
        },

        createJob() {
            let url = "/dashboard/jobs/createJob"

            console.log(this.modal_create_job)

            axios
                .post(url, this.modal_create_job)
                .then((response) => {

                    if (response.data.success == true) {

                        this.getJobs()

                        document.getElementById("closeCreate").click();


                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Data byly úspěšně změněny",
                            showConfirmButton: false,
                            timer: 800,
                        })
                    }
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.errors = response.data.errors
                })
        },

        updateJob() {
            let url = "/dashboard/jobs/" + this.modal_edit_job.id + "/update"

            axios
                .post(url, this.modal_edit_job)
                .then((response) => {

                    if (response.data.success == true) {

                        this.getJobs()

                        document.getElementById("closeEdit").click();

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Data byly úspěšně změněny",
                            showConfirmButton: false,
                            timer: 800,
                        })

                    }
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.update_errors = response.data.errors
                })
        },

        deleteJob() {
            let url = "/dashboard/jobs/" + this.get_job_id + "/delete";

            Swal.fire({
                title: 'Are you sure?',
                text: "tahle akce je nevratná!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Smazat!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Zrušit!'
            }).then((result) => {
                if (result.isConfirmed) {

                    axios
                        .post(url)
                        .then((response) => {

                            if (response.data.success == true) {

                                this.getJobs()
                            }
                        })

                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: "Projekt byl úspěšně přidán",
                        showConfirmButton: false,
                        timer: 800,

                    })

                    console.log("deleteJob - Práce byla smazána")

                }
            })


        }
    }
}
</script>

<style>

</style>
