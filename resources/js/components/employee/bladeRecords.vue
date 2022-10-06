<template>
    <div>
        <div class="text-center mt-5 mb-5">
            <div class="d-flex justify-content-center">
                <h1 class="text-dark text-uppercase fw-bolder col-2 py-2 rounded-3 rounded">
                    Historie
                </h1>
            </div>

            <!-- PŘIDAT PRÁCI,VYBRANÝ MĚSÍC -->
            <div class="container rounded bg-white py-4">
                <div class="row">
                    <div class="col-sm-4 mx-auto px-1" v-if="logged_user.id == form.id || logged_user.is_admin == 1">
                        <div class="card bg-dark">
                            <div class="card-body text-center">
                                <work-add-record @getWorks="getWorks(1)" :user="user" :logged_user="logged_user"
                                    :user_select_works="user_select_works">
                                </work-add-record>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mx-auto py-1">
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
                        <div class="d-flex flex-md-nowrap flex-wrap">
                            <!--    HISTORIE PRÁCE     -->
                            <div class="mx-1" style="min-width: 130px;">
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
                                                Místo
                                            </th>
                                            <th scope="col" class="col-2 text-uppercase">
                                                Práce
                                            </th>
                                            <th scope="col" class="col-2">
                                                <h4>Datum</h4>
                                                <h6>rok/měsíc/den</h6>
                                            </th>
                                            <!-- <th scope="col" class="col-4 text-uppercase"
                                                v-if="logged_user.id == form.id || logged_user.is_admin == 1">
                                                Detail
                                            </th> -->
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
                                            <!-- <td colspan="2"
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

                                            </td> -->
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
    </div>
</template>

<script>
export default {

    props: [
        "user",
        "in_year",
        "in_month",
        "active",
        "logged_user"
    ],

    data() {
        return {
            year: this.in_year,

            month: this.in_month,

            user_select_works: {},

            employee: {},

            work_modal: {},

            form: {},


            message: "",

            error: "",

            works_for_month: [],
        };
    },


}
</script>
