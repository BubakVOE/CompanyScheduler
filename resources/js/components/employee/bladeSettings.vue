<template>
    <div class="card p-5 w-75 mx-auto">

        <div class="row g-5">


            <div class="d-flex justify-content-center">
                <h1 class="text-dark text-uppercase fw-bolder py-2 rounded-3 rounded mx-2">
                    informace
                </h1>
            </div>

            <div class="col-md-7 col-lg-8  mx-auto ">

                <div class="text-center d-flex justify-content-center flex-column ">
                    <img style="width:100px; margin:auto" class="rounded-circle bg-secondary p-2"
                        :src="employee.avatar" />

                    <span v-if="employee.is_admin == 1" class="text-danger text-uppercase fw-bolder">
                        admin
                    </span>

                    <span v-if="employee.is_admin == 0" class="text-success text-uppercase fw-bolder">
                        uživatel
                    </span>
                </div>

                <hr class="border border-dark w-100 my-4">

                <h4 class="mb-1 ">Základni informace</h4>
                <form class="needs-validation" novalidate="" @submit.prevent="updateEmployee">
                    <div class="row g-3">
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Jméno</label>
                                <input type="text" class="form-control" placeholder="Petr"
                                    v-model="employee.first_name">

                                <div v-if="errors.first_name"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . first_name[0] }}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Příjmení</label>
                                <input type="text" class="form-control" placeholder="Novák"
                                    v-model="employee.last_name">

                                <div v-if="errors.last_name"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . last_name[0] }}
                                </div>


                            </div>

                            <div class="col-sm-12">
                                <div class="w-50 mx-auto">
                                    <label for="email" class="form-label">Email<span
                                            class="ms-2 text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" placeholder="petrnovak@gmail.com"
                                        v-model="employee.email" readonly>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">heslo</label>
                                <input type="password" class="form-control" v-model="employee.password">
                                
                                <div v-if="errors.password"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . password[0] }}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Potvrzení hesla</label>
                                <input type="password" class="form-control" v-model="employee.password_confirmation">
                            
                                <div v-if="errors.password"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . password[0] }}
                                </div>
                            
                            </div>

                        </div>

                        <hr class="border border-dark w-100 my-4">

                        <h4 class="mb-1">Rozšiřené informace</h4>

                        <div class="col-8">
                            <label for="employeename" class="form-label">Adresa bydliště</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" placeholder="Vybíralova"
                                    v-model="employee.address">

                                <div v-if="errors.address"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . address[0] }}
                                </div>

                            </div>
                        </div>

                        <div class="col-4">
                            <label for="employeename" class="form-label">číslo bytu</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" placeholder="19/4" 
                                v-model="employee.apartment">

                                <div v-if="errors.apartment"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . apartment[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">telefonní číslo</label>
                            <input type="text" class="form-control" placeholder="Novák34" v-model="employee.mobile">

                            <div v-if="errors.mobile"
                                class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                {{ errors . mobile[0] }}
                            </div>

                        </div>

                        <div class="col-md-2">
                            <label for="state" class="form-label">Barva uživatele</label>
                            <div class="d-flex justify-content-center align-items-center">
                                <input type="color" name="employee_color"
                                    class="w-50  form-control form-control-color me-3 " v-model="employee.user_color" />
                                <!-- <span class="ms-3">
                                    {{ employee.employee_color }}
                                </span> -->
                            </div>

                        </div>

                        <div class="col-md-3">
                            <label for="state" class="form-label">kč na hodinu </label>
                            <div class="d-flex justify-content-center align-items-center">
                                <input type="number" name="employee_color"
                                    class="w-50  form-control form-control-color me-3 " 
                                    :readonly="employee.is_admin == 0" v-model="employee.money_per_hour" />

                                    
                                <div v-if="errors.money_per_hour"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . money_per_hour[0] }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">přezdívka</label>
                            <input type="text" class="form-control" placeholder="Novák34" v-model="employee.username">
                            <div v-if="errors.username"
                                class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                {{ errors . username[0] }}
                            </div>
                        </div>
                    </div>

                    <button class="mt-4 w-100 btn btn-success btn-lg" type="submit">
                        Uložit

                    </button>
                </form>

            </div>
        </div>

        <!-- <div>
            <div class="text-center mt-5 mb-5">

                <div :style="'border-color:' + user.user_color" class="container rounded bg-white card">
                    <div class="d-flex justify-content-evenly align-items-center">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <span v-if="user.is_admin == 1" class="text-danger text-uppercase fw-bolder">
                                    admin
                                </span>

                                <span v-if="user.is_admin == 0" class="text-success text-uppercase fw-bolder">
                                    uživatel
                                </span>

                                <div class="my-2">
                                    <img :src="user.avatar" />
                                </div>

                                <span class="font-weight-bold">
                                    {{ user.first_name }}
                                    {{ user.last_name }}
                                </span>

                                <span class="text-black-50">
                                    {{ user.username }}
                                </span>
                                <span class="text-black-50">
                                    {{ user.email }}
                                </span>
                            </div>
                        </div>
                        <form class="d-flex justify-content-evenly" @submit.prevent="updateUserCard">

                            <div class="col-md-8 border-right">
                                <div class="p-3 py-5">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label class="labels">Jméno</label>
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="first name" v-model="user.first_name"
                                                :readonly="user.is_admin == 0" />



                                        </div>

                                        <div class="col-md-6">
                                            <label class="labels">Příjmení</label>
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="surname" v-model="user.last_name"
                                                :readonly="user.is_admin == 0" />
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label class="labels">
                                                Telefonní číslo
                                            </label>
                                            <input type="text" name="mobile" class="form-control"
                                                placeholder="Ulož své telefonní číslo" v-model="user.mobile"
                                                :class="user.is_admin == 0 ? 'border-success' : 'border-danger'" />
                                        </div>

                                        <div class="col-md-6">
                                            <label class="labels"> Přezdívka</label>
                                            <input type="text" name="username" class="form-control"
                                                placeholder="surname" v-model="user.username" />
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Email</label>
                                        <input type="text" name="email" class="form-control text-center"
                                            placeholder="Ulož svojí emailovou adresu" v-model="user.email" disabled />
                                    </div>
                                </div>
                            </div>


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
                                                    v-model="user.user_color" />
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
                                                    :readonly="user.is_admin == 0" v-model="user.money_per_hour" />

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
        </div> -->


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
            employee: {
                mobile: 0,
            },

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