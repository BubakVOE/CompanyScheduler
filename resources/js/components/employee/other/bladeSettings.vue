<template>

    <div class="container py-4 shadow-lg rounded-3">

        <header class="pb-3 mb-4 border-bottom d-flex justify-content-between">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-gear"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                    <path
                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                </svg>

                <span class="fs-4 ms-2">informace</span>
            </div>
        </header>

        <!-- <div :style="'border-color:' + employee.user_color" class="rounded card w-75 mx-auto"> -->
        <div class="rounded card w-75 mx-auto">
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

                <form class="d-flex justify-content-evenly flex-wrap flex-md-nowrap" @submit.prevent="updateEmployee">
                    <!-- základní údaje -->
                    <div class="col-md-8">
                        <div class="p-3 py-5 ">

                            <h1>
                                Základni informace
                            </h1>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Jméno</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="first name"
                                        v-model="employee.first_name" :readonly="employee.is_admin == 0" />

                                    <div v-if="errors.first_name"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . first_name[0] }}
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <label class="labels">Příjmení</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="surname"
                                        v-model="employee.last_name" :readonly="employee.is_admin == 0" />

                                    <div v-if="errors.last_name"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . last_name[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label class="labels">Email</label>
                                <input type="text" name="email" class="form-control text-center"
                                    placeholder="Ulož svojí emailovou adresu" v-model="employee.email" disabled />
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">
                                        Telefonní číslo
                                    </label>
                                    <input type="text" name="mobile" class="form-control"
                                        placeholder="Ulož své telefonní číslo" v-model="employee.mobile"
                                        :class="employee.is_admin == 0 ? 'border-success' : 'border-danger'" />

                                    <div v-if="errors.mobile"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . mobile[0] }}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="labels"> Přezdívka</label>
                                    <input type="text" name="username" class="form-control" placeholder="surname"
                                        v-model="employee.username" />

                                    <div v-if="errors.username"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . username[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-5 mx-auto">
                                    <label class="labels">
                                        Heslo
                                    </label>
                                    <input type="password" class="form-control" placeholder="Zmeň své heslo"
                                        v-model="employee.password">

                                    <div v-if="errors.password"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . password[0] }}
                                    </div>

                                </div>

                                <div class="col-md-5 mx-auto">
                                    <label class="labels">
                                        Potvrzení hesla
                                    </label>
                                    <input type="password" class="form-control" placeholder="Vlož stejné heslo"
                                        v-model="employee.password_confirmation" />

                                    <div v-if="errors.password"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . password[0] }}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="pb-5 pt-2 border-top border-dark">
                            <h1>
                                Rozšířené informace
                            </h1>

                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <label class="form-label">Adresa bydliště</label>
                                    <input type="text" class="form-control" placeholder="Adresa bydliště"
                                        v-model="employee.address" />

                                    <div v-if="errors.address"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . address[0] }}
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">číslo bytu</label>
                                    <input type="text" class="form-control" placeholder="19/4"
                                        v-model="employee.apartment">

                                    <div v-if="errors.apartment"
                                        class="alert alert-danger d-flex align-items-center invalid-feedback"
                                        role="alert">
                                        {{ errors . apartment[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="state" class="form-label">Barva uživatele</label>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="color" name="employee_color"
                                            class="w-50  form-control form-control-color me-3 "
                                            v-model="employee.user_color" />
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <label for="state" class="form-label">kč na hodinu </label>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="number" name="employee_color"
                                            class="w-50  form-control form-control-color me-3 "
                                            :readonly="employee.is_admin == 0" v-model="employee.money_per_hour" />


                                        <div v-if="errors.money_per_hour"
                                            class="alert alert-danger d-flex align-items-center invalid-feedback"
                                            role="alert">
                                            {{ errors . money_per_hour[0] }}
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- barvičky -->
                    <div class="container">
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

</template>
  
<script>
export default {
    props: [
        'user',
    ],

    data() {
        return {
            errors: {},
            employee: {},
        }
    },

    mounted() {
        this.getEmployee()
    },



    methods: {

        getEmployee() {
            let url = "/axios/employee/" + this.user + "/getEmployee";

            axios
                .post(url)
                .then((response) => {
                    this.employee = response.data.user
                })

        },

        updateEmployee() {
            let url = "/employee/" + this.user + "/updateEmployee";

            axios
                .post(url, this.employee)
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

                    console.log('funguje')

                    this.errors = ''

                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.errors = response.data.errors
                })

        }
    },

}
</script>