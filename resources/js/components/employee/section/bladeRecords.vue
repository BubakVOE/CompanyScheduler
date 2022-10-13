<template>
    <div class="container p-4 shadow-lg rounded-3">

        <header class="pb-3 mb-4 border-bottom d-flex justify-content-between">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-briefcase" viewBox="0 0 16 16">
                    <path
                        d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                </svg>

                <span class="fs-4 ms-2">Práce</span>
            </div>

            <div v-if="logged_user.id == form.id || logged_user.is_admin == 1" class="bg bg-success rounded">
                <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

                <work-add-record @getWorks="getWorks(1)" :user="user" :logged_user="logged_user"
                    :user_select_works="user_select_works">
                </work-add-record>

            </div>
        </header>


        <div class="text-center mt-5 mb-5">
            <!-- PŘIDAT PRÁCI,VYBRANÝ MĚSÍC -->
            <div class="container rounded bg-white py-4">
                <div class="row">

                    <div class="col-sm-4 mx-auto py-1">
                        <div class="card bg-dark">
                            <div class="card-body text-center">
                                <h1 class="text-uppercase text-white fw-bolder fs-4">
                                    Vybraný měsíc
                                </h1>

                                <div v-if="month == 0">
                                    <p class="card-text bg-light py-2 fw-bolder text-danger">
                                        Vyber nejdříve data pro zobrazení informací
                                    </p>
                                </div>

                                <div v-else>
                                    <p class="card-text text-white">
                                        <span class="fw-bolder">
                                            {{ month }}.
                                        </span>
                                        měsíc v kalendářním roce
                                    </p>
                                    <p class="card-text bg-light py-2 fw-bolder text-success">
                                        {{ month_salary }},-
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mx-auto py-1">
                        <div class="card bg-dark">
                            <div class="card-body text-center">
                                <h1 class="text-uppercase text-white fw-bolder fs-4">
                                    Počet prací
                                </h1>

                                <div v-if="month == 0">
                                    <p class="card-text bg-light py-2 fw-bolder text-danger">
                                        Vyber nejdříve data pro zobrazení informací
                                    </p>
                                </div>

                                <div v-else>
                                    <p class="card-text text-white">
                                        <span class="fw-bolder">
                                            {{ month }}.
                                        </span>
                                        měsíc v kalendářním roce
                                    </p>
                                    <p class="card-text bg-light py-2 fw-bolder text-success">
                                        {{ count_works }} záznamů
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mx-auto py-1">
                        <div class="card bg-dark">
                            <div class="card-body text-center">
                                <h1 class="text-uppercase text-white fw-bolder fs-4">
                                    Odpracované hodiny
                                </h1>

                                <div v-if="month == 0">
                                    <p class="card-text bg-light py-2 fw-bolder text-danger">
                                        Vyber nejdříve data pro zobrazení informací
                                    </p>
                                </div>

                                <div v-else>
                                    <p class="card-text text-white">
                                        <span class="fw-bolder">
                                            {{ month }}.
                                        </span>
                                        měsíc v kalendářním roce
                                    </p>
                                    <p class="card-text bg-light py-2 fw-bolder text-success">
                                        {{ count_hours }} hodin
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRÁCE, DETAILY O PRÁCI -->
            <div class="container rounded bg-white py-4">
                <div class="row">
                    <!--    HISTORIE PRÁCE, DETAILY O PRÁCI            -->
                    <div class="col mt-5">
                        <div class="d-flex flex-md-nowrap flex-wrap">
                            <!--    HISTORIE PRÁCE     -->
                            <div class="mx-1" style="min-width: 150px;">
                                <div class="d-grid justify-content-center">
                                    <h1 class="card-title bg-dark text-white card px-2 py-1 text-center">
                                        Datum
                                    </h1>
                                </div>

                                <div class="card mb-2 p-2" v-for="(months, i_year) in this.active" :key="months">
                                    <h1>
                                        {{ i_year }}
                                    </h1>

                                    <div v-for="i_month in months" :key="i_month">
                                        <button class="col-8 btn btn-primary m-1" @click="selectDate(i_year, i_month)"
                                            :href="'?year=' + i_year + '&month=' + i_month">
                                            {{ i_month }}. měsíc
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--    DETAILY O PRÁCI     -->
                            <div class="mx-1 w-100">
                                <div class="d-grid justify-content-center">
                                    <h1 class="card-title bg-dark text-white card px-2 py-1 text-center">
                                        Detaily o práci
                                    </h1>

                                    <div v-if="month != 0">
                                        <a :href="'/employee/'+ this.user.id + '/info/year=' + this.year + '/month=' + this.month + '.pdf'"
                                            class="btn btn-primary mb-2 d-flex flex-column">
                                            <span>
                                                PDF
                                                {{ month }}. měsíc {{ year }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive mx-1">
                                    <table class="table table-striped table-dark table-hover">
                                        <thead class="table-dark">
                                            <tr class="text-center">
                                                <th scope="col" class="col-1 text-uppercase">
                                                    ID
                                                </th>
                                                <th scope="col" class="col-2 text-uppercase">
                                                    Zaměstnanec
                                                </th>
                                                <th scope="col" class="col-1 text-uppercase">
                                                    Hodiny
                                                </th>
                                                <th scope="col" class="col-1 text-uppercase">
                                                    kč
                                                </th>
                                                <th scope="col" class="col-1 text-uppercase">
                                                    Výdělek
                                                </th>
                                                <th scope="col" class="col-2 text-uppercase">
                                                    Projekt
                                                </th>
                                                <th scope="col" class="col-2 text-uppercase">
                                                    Práce
                                                </th>
                                                <th scope="col" class="col-2">
                                                    <h4>Datum</h4>
                                                    <h6>rok/měsíc/den</h6>
                                                </th>
                                                <th scope="col" class="col-4 text-uppercase"
                                                    v-if="logged_user.id == form.id || logged_user.is_admin == 1">
                                                    Detail
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="work in works_for_month" :key="work"
                                                class="p-1 bg-white text-center">

                                                <th scope="row">
                                                    {{ work.id }}
                                                </th>
                                                <td>
                                                    {{ work.employee }}
                                                </td>
                                                <td>
                                                    {{ work.hours }}h
                                                </td>
                                                <td>
                                                    {{ work.money_per_hour }},-
                                                </td>
                                                <td class="text-success">
                                                    {{ work.hours * work.money_per_hour }},-
                                                </td>
                                                <td>
                                                    {{ work.project_name }}
                                                </td>
                                                <td>
                                                    {{ work.job }}
                                                </td>
                                                <td>
                                                    {{ work.date }}
                                                </td>

                                                <td v-if="logged_user.id == form.id || logged_user.is_admin == 1">

                                                    <div class="d-flex">
                                                        <form @submit.prevent="deleteWork"
                                                            class="text-center text-uppercase m-1">
                                                            <button class="btn btn-danger" type="submit"
                                                                @click="fillModal(work)">

                                                                Smazat
                                                            </button>
                                                        </form>

                                                        <button type="button"
                                                            class="btn btn-primary text-center text-uppercase m-1 "
                                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            @click="fillModal(work)">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--    EDIT - MODALNÍ -->
        <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            ID. {{ work_modal.id }} -&#45;&#45;
                            {{ work_modal.employee }}
                        </h5>
                        <button id="editButtonClose" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>

                    <form class="container col-8" @submit.prevent="updateWork">
                        <div class="modal-body">
                            <div class="mb-3">

                                <label class="form-label"> ID </label>
                                <input v-model="work_modal.id" name="user_id" type="text" class="form-control"
                                    aria-describedby="emailHelp" disabled />
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Zaměstnanec </label>
                                <input v-model="work_modal.employee" name="employee" type="text" class="form-control"
                                    aria-describedby="emailHelp" disabled />
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">
                                            Hodiny
                                        </label>
                                        <input v-model="work_modal.hours" type="number" class="form-control text-center"
                                            aria-describedby="hoursPerDay" placeholder="8" />

                                        <template v-if="update_errors.hours">
                                            <p v-for="error in update_errors.hours"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label"> kč/h </label>

                                        <input v-if="logged_user == 1" v-model="work_modal.money_per_hour"
                                            class="form-control text-center" aria-describedby="moneyPerHour"
                                            placeholder="peníze za hodinu" />

                                        <input v-if="logged_user == 0" v-model="work_modal.money_per_hour"
                                            class="form-control text-center" aria-describedby="moneyPerHour"
                                            placeholder="peníze za hodinu" disabled />

                                        <template v-if="update_errors.money_per_hour">
                                            <p v-for="error in update_errors.money_per_hour"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Projekt
                                </label>

                                <select class="form-select" v-model="work_modal.project_name">
                                    <template v-for="user_select_work in user_select_works">

                                        <template v-if="user_select_work.is_done == 0">
                                            <option :value="user_select_work.name">
                                                {{ user_select_work.name }}
                                            </option>
                                        </template>

                                        <!--
                                        <option :value="user_select_work.name">
                                            {{  user_select_work.name  }}
                                        </option>-->
                                    </template>
                                </select>

                                <template v-if="update_errors.project">
                                    <p v-for="error in update_errors.project"
                                        class="alert alert-danger d-flex align-items-center" role="alert">
                                        {{ error }}
                                    </p>
                                </template>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Vykonáná práce
                                </label>
                                <input v-model="work_modal.job" name="job" type="text" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Řezání dřeva" />

                                <template v-if="update_errors.job">
                                    <p v-for="error in update_errors.job"
                                        class="alert alert-danger d-flex align-items-center" role="alert">
                                        {{ error }}
                                    </p>
                                </template>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Datum </label>
                                <input v-model="work_modal.date" type="date" name="date" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" />

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
                                Neukládat
                            </button>

                            <button type="submit" class="col-6 btn btn-primary">
                                Uložit změny
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

    props: [
        "user",

        "logged_user",

        "active",

        "in_year",

        "in_month",

        "project_data",

    ],

    data() {
        return {
            user_select_works: {},
            employee: {},
            work_modal: {},
            form: {},
            year: this.in_year,
            month: this.in_month,

            message: "",

            works_for_month: [],

            count_works: 0,
            count_hours: 0,

            update_errors: {},

        };
    },

    mounted() {
        this.user_select_works = this.project_data;

        this.employee = this.user;

        this.getWorks();
    },

    methods: {

        fillModal(work) {
            this.work_modal = work;
        },

        getWorks() {
            let url = '/axios/employee/worktime/' + this.user.id + '/get_works';

            axios
                .post(url, {
                    year: this.year,
                    month: this.month
                })

                .then((response) => {

                    if (response.data != 0) {

                        console.log('get_work funguje');

                        this.works_for_month = response.data.works_for_month;
                        this.count_works = response.data.count_works;
                        this.count_hours = response.data.count_hours;

                    } else {

                        console.log('get_work nefunguje');
                    }
                })
        },

        // SelectDateController
        selectDate(year, month) {

            this.year = year
            this.month = month


            history.pushState({},
                null,
                window.location.origin + "/employee/" + this.user.id + "/records?year=" + year + "&month=" + month
            );

            this.getWorks();
        },

        updateWork() {
            let url = "/employee/worktime/" + this.user.id + "/update";

            axios
                .post(url, this.work_modal)
                .then((response) => {
                    if (response.data.success == true) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Data byly úspěšně změněny",
                            showConfirmButton: false,
                            timer: 800,
                        })

                        document.getElementById("editButtonClose").click();

                        this.getWorks()
                    }
                }).catch(({ response }) => {
                    console.log(response.data.errors)
                    this.update_errors = response.data.errors
                });
        },

        // WorkTimeController
        deleteWork() {
            let url = "/employee/worktime/" + this.work_modal.id + "/delete";

            Swal.fire({
                title: 'Akce je nevratná!',
                text: "Opravdu chceš smazat data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Smazat!',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Zrušit!'
            }).then((result) => {

                if (result.isConfirmed) {

                    axios
                        .post(url, this.work_modal)
                        .then((response) => {

                            if (response.data.success == true) {

                                this.getWorks();

                                document.getElementById("editButtonClose").click();

                                Swal.fire({
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: "Práce byla úspešně odebrán",
                                    showConfirmButton: false,
                                    timer: 800,
                                })

                                console.log("deleteUserFromProject - Uživatel byl smazán")

                            } else {

                                Swal.fire({
                                    position: 'bottom-end',
                                    icon: 'alert',
                                    title: "Něco se nepovedlo",
                                    showConfirmButton: true,
                                })
                                console.log("deleteUserFromProject - Uživatele se nepovedlo smazat")
                            }
                        })
                } else {
                    console.log("deleteUserFromProject - Uživatel nebyl smazán")

                }
            })
        },

    },




    computed: {
        month_salary() {
            let price_per_month = 0;

            if (this.works_for_month) {
                Object.values(this.works_for_month).forEach((work) => {
                    price_per_month = price_per_month + work.hours * work.money_per_hour;
                });
            }
            return price_per_month;
        },
    },



}
</script>
