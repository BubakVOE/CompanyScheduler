<template>


    <div class="d-grid justify-content-center  ">

        <div class="bg-dark py-4 px-5 col-12">
            <h1 class="text-uppercase text-white fw-bolder">Přidat práci </h1>

            <div>
                <button type="button" class="btn btn-success btn-outline-white" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Přidat práci
                </button>
            </div>f
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="py-4 text-center upperase" id="exampleModalLabel">
                            Přidat práci
                        </h1>

                        <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>

                    <form @submit.prevent="createNewJob" class='container col-10'>

                        <div class="modal-body">
                            <div class='mb-3 col-10 container'>

                                <label for="exampleInputEmail1" class="form-label">
                                    ID
                                </label>
                                <input v-model="form.user_id" name="user_id" type="text" class="form-control"
                                    aria-describedby="emailHelp" readonly>
                            </div>

                            <div class='mb-3 col-10 container'>
                                <label for="exampleInputEmail1" class="form-label">
                                    Zaměstnanec

                                </label>
                                <input v-model="form.employee" name="employee" type="text" class="form-control"
                                    aria-describedby="emailHelp" readonly>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">
                                            Hossdiny
                                        </label>
                                        <input v-model="form.hours" name="place" type="number"
                                            class="form-control text-center" aria-describedby="hoursPerDay"
                                            placeholder="8" step="0.1">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <label class="form-label">
                                            kč/h
                                        </label>

                                        <input v-if="logged_user == 1" v-model="form.money_per_hour" name="place"
                                            class="form-control text-center" aria-describedby="moneyPerHour"
                                            placeholder="peníze za hodinu" />

                                        <input v-if="logged_user == 0" v-model="form.money_per_hour" name="place"
                                            class="form-control text-center" aria-describedby="moneyPerHour"
                                            placeholder="peníze za hodinu" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class='mb-3 col-10 container'>

                                <label for="exampleInputEmail1" class="form-label">
                                    Místo
                                </label>

                                <select class="form-select" v-model="form.place">
                                    <template v-for="user_select_work in user_select_works">
<!--                                        <option>
                                            {{ user_select_work.is_done }}
                                        </option>-->

                                        <template v-if="user_select_work.is_done == 0">
                                            <option :value="user_select_work.name">
                                                {{  user_select_work.name  }}
                                            </option>
                                        </template>

                                    </template>
                                </select>
                            </div>

                            <div class='mb-3 col-10 container'>
                                <label for="exampleInputEmail1" class="form-label">
                                    Vykonáná práce
                                </label>
                                <input v-model="form.job" name="job" type="text" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Řezání dřeva">
                            </div>

                            <div class='mb-3 col-10 container'>
                                <label for="exampleInputEmail1" class="form-label">
                                    Datum
                                </label>
                                <input v-model="form.date" type="date" name="date" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                zavřít
                            </button>

                            <button type="submit" class="col-6 btn btn-success">
                                Přidat
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
    name: "WorkAddRecord",
    props: [
        'user',
        'work_times',
        'confirmed',
        'logged_user',
        'user_select_works',
    ],

    data() {
        return {
            user_select_work: {},

            form: {},
        }
    },

    computed: {},

    mounted() {

        this.form.user_id = this.user.id;
        this.form.employee = this.user.first_name + ' ' + this.user.last_name;
        this.form.money_per_hour = this.user.money_per_hour;
        //this.form.hours = this.user.hours;
        //this.form.place = this.user.place;
        //this.form.job = this.user.job;
        //this.form.date = this.user.date;
    },

    methods: {

        getWorks() {
            this.$emit('getWorks');
        },

        hideModal() {
        },

        // WorkTimeController
        createNewJob() {
            let url = "/employee/worktime/" + this.user.id + "/store";

            axios
                .post(url, this.form)
                .then((response) => {
                    document.getElementById('closeModal').click();

                    this.getWorks();


                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: "Práce byla úspešně odebrán",
                        showConfirmButton: false,
                        timer: 800,
                    })
                })
        },
    }
}


</script>

<style scoped>
</style>
