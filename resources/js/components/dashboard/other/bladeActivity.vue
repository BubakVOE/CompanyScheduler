<template>
    <div class="container py-4 shadow-lg">
        <header class="pb-3 mb-4 border-bottom">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-info-square" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
                <span class="fs-4 ms-2">Záznamy aktivit</span>
            </div>
        </header>

        <!-- <pagination :data="models" @pagination-change-page="getModels">
        </pagination> -->

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">

                <h1 class="display-5 fw-bold">Vyber model(subject)</h1>

                <select class="btn btn-sm btn-outline-secondary dropdown-toggle m-5" v-model="subject_name"
                    @change="activityLog()">

                    <option value="all">
                        Všechny
                    </option>

                    <template v-for="model in models">
                        <option :value="model">
                            {{ model }}
                        </option>
                    </template>
                </select>

                <h1 class="display-5 fw-bold">Vyber model(causer)</h1>

                <select class="btn btn-sm btn-outline-secondary dropdown-toggle m-5" v-model="causer_name"
                    @change="activityLog()">

                    <option value="all">
                        Všechny
                    </option>

                    <template v-for="model in models">
                        <option :value="model">
                            {{ model }}
                        </option>
                    </template>
                </select>

            </div>
        </div>

        <div class="row align-items-md-stretch">

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th class="col-1 text-uppercase">
                                ID
                            </th>

                            <th class="col-1 text-uppercase">
                                popis
                            </th>

                            <th class="col-2 text-uppercase">
                                subject_type
                            </th>

                            <th class="col-2 text-uppercase">
                                subject_ID
                            </th>


                            <th class="col-1 text-uppercase">
                                causer_type
                            </th>

                            <th class="col-1 text-uppercase">
                                causer_ID
                            </th>

                            <th class="col-1 text-uppercase">
                                datum
                            </th>

                            <th class="col-1 text-uppercase">
                                Další
                            </th>
                        </tr>
                    </thead>

                    <tbody class="w-100">
                        <tr v-for="activity in activities">
                            <td class="text-center">
                                {{ activity.id }}
                            </td>

                            <td class="text-center">

                                <span v-if="activity.description == 'deleted'">
                                    <button class="btn btn-danger text-white rounded ps-2 pe-2 pt-1 pb-1">
                                        {{ activity.description }}
                                    </button>
                                </span>

                                <span v-if="activity.description == 'created'">
                                    <button class="btn btn-success text-white rounded ps-2 pe-2 pt-1 pb-1">
                                        {{ activity.description }}
                                    </button>
                                </span>

                                <span v-if="activity.description == 'updated'">
                                    <button class="btn btn-primary text-white rounded ps-2 pe-2 pt-1 pb-1">
                                        {{ activity.description }}
                                    </button>
                                </span>
                            </td>

                            <td class="text-center">
                                {{ activity.subject_type }}
                            </td>

                            <td class="text-center">
                                {{ activity.subject_id }}
                            </td>

                            <td class="text-center">
                                {{ activity.causer_type }}
                            </td>

                            <td class="text-center">
                                {{ activity.causer_id }}
                            </td>

                            <td>
                                {{ activity.created_at }}
                            </td>

                            <td class="text-center d-flex">
                                <div class="me-1">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editActivity" @click="activityModal(activity)">
                                        edit
                                    </button>
                                </div>

                                <div class="ms-1">
                                    <button class="btn btn-danger">
                                        smazat
                                    </button>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="editActivity" tabindex="-1" aria-labelledby="editActivity" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center border-2 border-danger">
                        <h5 class="modal-title border-2 border-danger">
                            modal
                        </h5>

                        <h4 class="text-center d-flex justify-content-center mx-5">
                            Detaily
                        </h4>

                        <button id="closeCreate" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body ">

                        <template v-if="activity_modal.description == 'updated'">

                            <h2 class="text-center bg-primary w-25 text-white rounded-3 py-1 text-uppercase mx-auto">
                                {{ activity_modal.event }}
                            </h2>


                            <div class="row g-5 mx-auto">
                                <div class=" card p-3 w-25 mx-auto">
                                    <h1>Změněno</h1>
                                    <h5>{{ activity_modal.subject_type }} ({{ activity_modal.subject_id }})</h5>
                                </div>



                                <div class=" card p-3 w-25 mx-auto">
                                    <h1>Způsobil</h1>
                                    <h5>{{ activity_modal.causer_type }} ({{ activity_modal.causer_id }}) </h5>
                                </div>

                                <div class="row row-cols-md-2 p-5 ">
                                    <div class="col text-end ">
                                        <template v-for="old_data in activity_modal.properties.old">
                                            <li>
                                                {{ old_data }}
                                            </li>
                                        </template>
                                    </div>

                                    <div class="col">
                                        <template v-for="updated_data in activity_modal.properties.attributes">
                                            <li>
                                                {{ updated_data }}
                                            </li>
                                        </template>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <br>
                                {{ activity_modal }}


                            </div>
                        </template>

                        <template v-if="activity_modal.description == 'created'">
                            <h2 class="text-center bg-success w-25 text-white rounded-3 py-1 text-uppercase mx-auto">
                                {{ activity_modal.event }}
                            </h2>

                            <div class="row g-5 mx-auto">
                                <div class="col-md-6 card p-3 w-25 mx-auto">
                                    <h1>Přidáno</h1>
                                    <h5>{{ activity_modal.subject_type }} ({{ activity_modal.subject_id }})</h5>
                                </div>

                                <div class="col-md-6 card p-3 w-25 mx-auto">
                                    <h1>Způsobil</h1>
                                    <h5>{{ activity_modal.causer_type }} ({{ activity_modal.causer_id }}) </h5>
                                </div>

                                <div class="row row-cols-md-1 p-5 ">
                                    <div class="col text-center">
                                        <template v-for="created_data in activity_modal.properties.attributes">
                                            <li>
                                                {{ created_data }}
                                            </li>
                                        </template>
                                    </div>

                                </div>

                                <br>
                                <br>
                                <br>
                                {{ activity_modal }}

                            </div>
                        </template>

                        <template v-if="activity_modal.description == 'deleted'">
                            <h2 class="text-center bg-danger w-25 text-white rounded-3 py-1 text-uppercase mx-auto">
                                {{ activity_modal.event }}
                            </h2>

                            <div class="row g-5 mx-auto">
                                <div class="col-md-6 card p-3 w-25 mx-auto">
                                    <h1>Změněno</h1>
                                    <h5>{{ activity_modal.subject_type }} ({{ activity_modal.subject_id }})</h5>
                                </div>

                                <div class="col-md-6 card p-3 w-25 mx-auto">
                                    <h1>Způsobil</h1>
                                    <h5>{{ activity_modal.causer_type }} ({{ activity_modal.causer_id }}) </h5>
                                </div>

                                <div class="row row-cols-md-1 p-5 ">
                                    <div class="col text-center">
                                        <template v-for="deleted_data in activity_modal.properties.old">
                                            <li>
                                                {{ deleted_data }}
                                            </li>
                                        </template>
                                    </div>

                                </div>


                                <br>
                                <br>
                                <br>
                                {{ activity_modal }}
                            </div>
                        </template>

                                    <!-- <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">

                                        <div class="col">
                                            <div class="card mb-4 rounded-3 shadow-sm">
                                                <div class="card-header py-3">
                                                    <h4 class="my-0 fw-normal">Table colums</h4>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                        <li>10 users included</li>
                                                        <li>2 GB of storage</li>
                                                        <li>Email support</li>
                                                        <li>Help center access</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card mb-4 rounded-3 shadow-sm">
                                                <div class="card-header py-3">
                                                    <h4 class="my-0 fw-normal">Free</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">$0<small
                                                            class="text-muted fw-light">/mo</small></h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                        <li>10 users included</li>
                                                        <li>2 GB of storage</li>
                                                        <li>Email support</li>
                                                        <li>Help center access</li>
                                                    </ul>
                                                    <button type="button"
                                                        class="w-100 btn btn-lg btn-outline-primary">Sign up for
                                                        free</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-4 rounded-3 shadow-sm">
                                                <div class="card-header py-3">
                                                    <h4 class="my-0 fw-normal">Pro</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">$15<small
                                                            class="text-muted fw-light">/mo</small></h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                        <li>20 users included</li>
                                                        <li>10 GB of storage</li>
                                                        <li>Priority email support</li>
                                                        <li>Help center access</li>
                                                    </ul>
                                                    <button type="button" class="w-100 btn btn-lg btn-primary">Get
                                                        started</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                                <div class="card-header py-3 text-bg-primary border-primary">
                                                    <h4 class="my-0 fw-normal">Enterprise</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">$29<small
                                                            class="text-muted fw-light">/mo</small></h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                        <li>30 users included</li>
                                                        <li>15 GB of storage</li>
                                                        <li>Phone and email support</li>
                                                        <li>Help center access</li>
                                                    </ul>
                                                    <button type="button" class="w-100 btn btn-lg btn-primary">Contact
                                                        us</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- {{ activity_modal.properties.old.id }}

                                    <template v-for="test in activity_modal.properties.old">
                                        {{ test }} <br><br><br><br>
                                    </template>
                                    {{ activity_modal.properties }} -->

                                    <!-- <template v-for="test in activity_modal.old">
                                        {{ test }} <br>
                                    </template> -->


<!-- 
                        {{ activity_modal.id }}
                        {{ activity_modal.description }}
                        <br>
                        <br>
                        <br>
                         -->


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: [
    ],

    data() {
        return {
            subject_name: "all",
            causer_name: "all",
            activities: {},

            activity_modal: {},

            models: [],

        }
    },


    mounted() {
        this.activityLog()
        this.getModels();
    },

    methods: {
        //Our method to GET results from a Laravel endpoint

        // getModels(page = 1) {
        //     axios.get('axios/dashboard/activity/all?page='+ page)
        //         .then(response => {
        //             this.models = response.data.models;
        //         });
        // },

        getModels() {
            let url = "/axios/dashboard/activity/getModels"

            axios
                .post(url)
                .then(response => {
                    this.models = response.data.models;
                })
        },

        activityModal(activity) {
            this.activity_modal = activity
        },

        activityLog() {
            let url = "/axios/dashboard/activity/all"
            // subject_name
            // causer_name

            let data = new FormData();

            data.append('subject_name', this.subject_name);
            data.append('causer_name', this.causer_name);


            axios
                .post(url, data)
                .then((response) => {
                    this.activities = response.data.activities
                    console.log(response.data.models)
                })
        }


    }
}
</script>
