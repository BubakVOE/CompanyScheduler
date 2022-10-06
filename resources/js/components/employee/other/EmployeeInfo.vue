<template>
    <div>
        <!-- INFORMACE -->
        <div class="text-center mt-5 mb-5">
            <div class="d-flex justify-content-center">
                <h1 class="text-dark text-uppercase fw-bolder col-2 py-2 rounded-3 rounded mx-2">
                    informace
                </h1>
            </div>
            <!--
                        <div :class="employee.is_admin === 0 ? 'border-success' : 'border-danger'"
            -->
            <div :style="'border-color:' + employee.user_color" class="container rounded bg-white card">
                <div class="d-flex justify-content-evenly align-items-center flex-wrap flex-md-nowrap">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <span v-if="employee.is_admin == 1" class="text-danger text-uppercase fw-bolder">
                                admin
                            </span>

                            <span v-if="employee.is_admin == 0" class="text-success text-uppercase fw-bolder">
                                uživatel
                            </span>

                            <div class="my-2">
                                <img :src="employee.avatar" />
                            </div>

                            <span class="font-weight-bold">
                                {{ employee.first_name }}
                                {{ employee.last_name }}
                            </span>

                            <span class="text-black-50">
                                {{ employee.username }}
                            </span>
                            <span class="text-black-50">
                                {{ employee.email }}
                            </span>
                        </div>
                    </div>

                    <form class="d-flex justify-content-evenly flex-wrap flex-md-nowrap" @submit.prevent="updateEmployeeCard">
                        <!-- základní údaje -->
                        <div class="col-md-8 border-right">
                            <div class="p-3 py-5">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="labels">Jméno</label>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="first name" v-model="employee.first_name"
                                            :readonly="employee.is_admin == 0" />



                                    </div>

                                    <div class="col-md-6">
                                        <label class="labels">Příjmení</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="surname"
                                            v-model="employee.last_name" :readonly="employee.is_admin == 0" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="labels">
                                            Telefonní číslo
                                        </label>
                                        <input type="text" name="mobile" class="form-control"
                                            placeholder="Ulož své telefonní číslo" v-model="employee.mobile"
                                            :class="employee.is_admin == 0 ? 'border-success' : 'border-danger'" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="labels"> Přezdívka</label>
                                        <input type="text" name="username" class="form-control" placeholder="surname"
                                            v-model="employee.username" />
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label class="labels">Email</label>
                                    <input type="text" name="email" class="form-control text-center"
                                        placeholder="Ulož svojí emailovou adresu" v-model="employee.email" disabled />
                                </div>
                            </div>
                        </div>

                        <!-- barvičky -->
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="p-3 py-5">
                                        <div class=" d-flex justify-content-center align-items-center flex-column">
                                            <label class="labels">
                                                Barva uživatele
                                            </label>

                                            <input type="color" name="user_color"
                                                class="form-control form-control-color text-center"
                                                v-model="employee.user_color" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3 py-5">
                                        <div class="">
                                            <label class="labels">
                                                Kč na hodinu
                                            </label>


                                            <input type="number" name="user_color"
                                                class="form-control form-control-color text-center w-100"
                                                :readonly="employee.is_admin == 0" v-model="employee.money_per_hour" />





                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-success">
                                        Uložit
                                    </button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- PŘEHLED -->
        <div class="text-center mt-5 mb-5">
            <div class="d-flex justify-content-center">
                <h1 class="text-dark text-uppercase fw-bolder col-2 py-2 rounded-3 rounded">
                    Přehled
                </h1>
            </div>

            <div class="container rounded bg-white py-4">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card bg-dark m-1">
                            <div class="card-body text-center">
                                <h1 class="text-center text-white text-uppercase">
                                    Včerejší den
                                </h1>

                                <p class="text-white text-opacity-25">
                                    (aktuálně je
                                    {{ this_yesterday_number + 1 }}.{{ last_month_number + 1 }}. {{ year }})
                                </p>

                                <h2 class="card-text text-white ">
                                    {{ this_yesterday_number }}.
                                    {{ last_month_number + 1 }}. {{ year }}
                                </h2>

                                <p class="card-text bg-light py-2 fw-bolder text-success">
                                    {{ this_yesterday_earns }},-
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark m-1">
                            <div class="card-body text-center">
                                <h1 class="text-center text-white text-uppercase">
                                    Minulý týden
                                </h1>

                                <p class="text-white text-opacity-25">
                                    (aktuálně je {{ last_week_number + 1 }}.týden)
                                </p>

                                <h2 class="card-text text-white">
                                    {{ last_week_number }}. týden v kalendářním roce
                                </h2>

                                <p class="card-text bg-light py-2 fw-bolder text-success">
                                    {{ last_week_earns }},-
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark m-1">
                            <div class="card-body text-center">
                                <h1 class="text-center text-white text-uppercase">
                                    Minulý měsíc
                                </h1>

                                <p class="text-white text-opacity-25">
                                    (aktuálně je {{ last_month_number + 1 }}.měsíc)
                                </p>

                                <h2 class="card-text text-white">
                                    {{ last_month_number }}. měsíc v kalendářním roce
                                </h2>

                                <p class="card-text bg-light py-2 fw-bolder text-success">
                                    {{ last_month_earns }},-
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HISTORIE -->
        <div class="text-center mt-5 mb-5">
            <div class="d-flex justify-content-center">
                <h1 class="text-dark text-uppercase fw-bolder col-2 py-2 rounded-3 rounded">
                    Historie
                </h1>
            </div>

            <!-- PŘIDAT PRÁCI,VYBRANÝ MĚSÍC -->
            <div class="container rounded bg-white py-4">
                <div class="row">
                    <div class="col-sm-4 mx-auto" v-if="logged_user.id == form.id || logged_user.is_admin == 1">
                        <div class="card bg-dark">
                            <div class="card-body text-center">
                                <work-add-record @getWorks="getWorks(1)" :user="user" :logged_user="logged_user"
                                    :user_select_works="user_select_works">
                                </work-add-record>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mx-auto">
                        <div class="card bg-dark">
                            <div class="card-body text-center">
                                <h1 class="text-uppercase text-white fw-bolder">
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
                </div>
            </div>

            <!-- PRÁCE, DETAILY O PRÁCI -->
            <div class="container rounded bg-white py-4">
                <div class="row">
                    <!--    HISTORIE PRÁCE, DETAILY O PRÁCI            -->
                    <div class="col mt-5">
                        <div class="d-flex">
                            <!--    HISTORIE PRÁCE     -->
                            <div class="col-2 mx-1">
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
                            <div class="col-10 mx-2">
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
                                                Místo
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
                                            <td>{{ work.hours }}h</td>
                                            <td>{{ work.money_per_hour }},-</td>
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
                                            <td colspan="2"
                                                v-if="logged_user.id == form.id || logged_user.is_admin == 1">

                                                <div class="d-flex">
                                                    <form @submit.prevent="deleteWork"
                                                        class="text-center text-uppercase m-1">
                                                        <button class="btn btn-danger" type="submit"
                                                            data-bs-toggle="modal" data-bs-target="#deleteBackdrop"
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
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Míssto </label>
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
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Vykonáná práce
                                </label>
                                <input v-model="work_modal.job" name="job" type="text" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Řezání dřeva" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Datum </label>
                                <input v-model="work_modal.date" type="date" name="date" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" />
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
import WorkAddRecord from "./WorkAddRecord";

export default {
    name: "EmployeeInfo",
    components: {
        WorkAddRecord
    },

    props: [
        "user",

        "logged_user",

        "active",

        "in_year",

        "in_month",

        "project_data",

        "this_yesterday_earns",
        "this_yesterday_number",

        "last_week_earns",
        "last_week_number",

        "last_month_earns",
        "last_month_number",
    ],

    data() {
        return {
            user_select_works: {},

            cat: 1,

            employee: {},

            work_modal: {},

            form: {},

            year: this.in_year,

            month: this.in_month,

            message: "",

            error: "",

            works_for_month: [],
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

        // EmployeeController
        updateEmployeeCard() {
            let url = "/employee/" + this.user.id + "/updateEmployeeCard";

            axios
                .post(url, {
                    first_name: this.employee.first_name,
                    last_name: this.employee.last_name,
                    mobile: this.employee.mobile,
                    username: this.employee.username,
                    money_per_hour: this.employee.money_per_hour,
                    user_color: this.employee.user_color,
                })
                .then((response) => {
                    if (response.data.success == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Změny byly provedeny úspěšně',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                    if (response.data.success == false) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: true,
                        })

                    }
                })
        },

        // WorkTimeController
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

                        this.works_for_month = response.data;

                    } else {

                        console.log('get_work nefunguje');
                    }
                });
        },

        // WorkTimeController
        deleteWork() {
            let url = "/employee/worktime/" + this.work_modal.id + "/delete";

            Swal.fire({
                title: 'Akce je nevratná!',
                text: "Opravdu jsi přeješ smazat data?",
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

        // WorkTimeController
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
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Něco se nepovedlo !",
                            showConfirmButton: false,
                            footer: '<a href="/">Proč mám error ?</a>',
                            timer: 1000,
                        });
                    }
                });
        },

        // SelectDateController
        selectDate(year, month) {

            this.year = year
            this.month = month


            history.pushState({},
                null,
                window.location.origin + "/employee/" + this.user.id + "/show?year=" + year + "&month=" + month
            );

            this.getWorks();
        },


    },

    computed: {

        isDisabled() {
            return true;
        },

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
};
</script>

<style>

</style>
