<template>

    <div>
        <!-- SPOLEČNOSTI -->
        <div class="container py-4 shadow-lg rounded-3">

            <nav>
                <header class="pb-3 mb-4 border-bottom d-flex justify-content-between ">

                    <div class="d-flex align-items-center text-dark text-decoration-none">

                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                            <path
                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                        </svg>

                        <span class="fs-4 ms-2">Společnosti</span>

                    </div>

                    <div class="bg bg-success rounded">
                        <button type="button" class="btn text-light" data-bs-toggle="modal"
                            data-bs-target="#createNewCompany">
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
                                Přidat společnost
                            </span>
                        </button>
                    </div>
                </header>


            </nav>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col" class="col-1 text-uppercase">
                                ID
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                barva
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                logo
                            </th>

                            <th scope="col" class="col-2 text-uppercase">
                                Název
                            </th>

                            <th class="col-1 text-uppercase">
                                Edit
                            </th>
                        </tr>
                    </thead>

                    <tbody class="w-100">
                        <tr v-for="company in companies" :key="company"
                            class="p-1 bg-white text-center align-items-center">
                            <td>
                                {{ company . id }}
                            </td>

                            <td>
                                <div class="btn" :style="'background-color:' + company.company_color">
                                    {{ company . company_color }}

                                </div>
                            </td>

                            <td>
                                <!-- <img src="companies/company/logo/company-123.jpg" alt="" srcset=""> -->
                                <img :src="company.cover_path" style="max-height:100px; max-width:100px" alt="img">
                            </td>

                            <td>
                                {{ company . name }}
                            </td>

                            <td>
                                <div class="d-flex flex-col justify-content-evenly">

                                    <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                        data-bs-target="#companyModalEdit" @click="companyData(company)">
                                        edit
                                    </button>

                                    <form class="" @submit.prevent="deleteCompany">
                                        <button type="submit" class="btn btn-danger" @click="companyData(company)">
                                            delete
                                        </button>
                                    </form>

                                    <a :href="'/dashboard/companies/' + company.id"
                                        class="btn btn-secondary ">
                                        zobrazit
                                    </a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- modal - ADD  -->
        <div class="modal fade" id="createNewCompany" tabindex="-1" aria-labelledby="createNewCompany"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="py-4 text-uppercase">
                            Vytvořit novou společnost
                        </h4>

                        <button type="button" id="closeCreate" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8 p-5">
                                <div v-if="success != ''" class="alert alert-success">
                                    {{ success }}
                                </div>

                                <form @submit.prevent="createCompany" enctype="multipart/form-data">

                                    <div>
                                        <label>
                                            Název společnosti
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="text" class="form-control" v-model="company_create.name"
                                            placeholder="název společnosti" name="name">

                                        <template v-if="create_errors.name">
                                            <p v-for="error in create_errors.name"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>


                                    </div>

                                    <div class="py-3">
                                        <input type="file" class="form-control" v-on:change="onChange">

                                        <template v-if="create_errors.file">
                                            <p v-for="error in create_errors.file"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                    <div class="py-3">
                                        <label class="labels">
                                            company color - {{ company_create . color }}
                                        </label>

                                        <input type="color" v-model="company_create.color">


                                        <template v-if="create_errors.color">
                                            <p v-for="error in create_errors.color"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">
                                        Upload
                                    </button>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- modal - EDIT -->
        <div class="modal fade bd-example-modal-lg" id="companyModalEdit" tabindex="-1"
            aria-labelledby="companyModalEdit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center border-2 border-danger">
                        <h4 class="py-4 text-uppercase">
                            Upravuješ detaily společnosti
                        </h4>

                        <button type="button" id="closeEdit" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>

                    <div>

                        <form @submit.prevent="updateCompany" enctype="multipart/form-data" class="container">
                            <div class="modal-body d-flex justify-content-center">

                                <div class="p-2">
                                    <div class="form-input mb-3 container">
                                        <label>Změnit název společnosti</label>

                                        {{ company_update.id = company . id }}

                                        <input type="text" class="form-control" v-model="company_update.name" />
                                    
                                        <template v-if="update_errors.name">
                                            <p v-for="error in update_errors.name"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    
                                    </div>

                                    <div>

                                        <label class="labels">
                                            company_color - {{ company_update . color }}
                                        </label>

                                        <input type="color" name="user_color" v-model="company_update.color" />
                                    
                                        <template v-if="update_errors.color">
                                            <p v-for="error in update_errors.color"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>
                                    </div>

                                    <div class="container">
                                        <img :src="company.cover_path" style="max-height:200px; max-width:200px"
                                            alt="mrdka">
                                    </div>

                                    <div class="py-3">
                                        <input type="file" accept="image/*" v-on:change="onChange">
                                        
                                        <template v-if="update_errors.file">
                                            <p v-for="error in update_errors.file"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer mt-5">
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
    </div>

</template>


<script>
export default {
    name: "bladeCompanies",

    props: [
        // "companies",
    ],

    data() {
        return {
            colors: "",
            success: "",

            company: {
                id: 0,
                name: "",
                cover_path: "",
            },

            company_create: {
                name: "",
                cover_path: "",
                color: "#0f4c81",
            },

            company_update: {
                id: 0,
                name: "",
                cover_path_new: "",
                cover_path_old: "",
                file: null,
            },

            companies: [],

            create_errors: {},
            update_errors: {},
        }
    },

    mounted() {

        this.getCompanies();


        this.company_update = this.company;
    },

    methods: {
        companyData(company) {
            this.company.id = company.id;
            this.company.name = company.name;
            this.company.cover_path = company.cover_path;
            this.company.color = company.company_color;
        },

        onChange(e) {
            this.company_update.file = e.target.files[0];
        },

        // CREATE
        createCompany() {
            let existingObj = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();

            data.append('file', this.company_update.file);
            data.append('name', this.company_create.name);
            data.append('color', this.company_create.color);

            axios
                .post('/dashboard/companies/createCompany', data, config)
                .then((response) => {

                    if (response.data.success == true) {

                        this.getCompanies()

                        document.getElementById("closeCreate").click();

                        Swal.fire({
                            position: 'bottom-end',
                            icon: "success",
                            title: "Společnost byla vytvořena",
                            showConfirmButton: false,
                            timer: 800,
                        });

                    }

                    if (response.data.error === 'exist') {

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Jméno je již použito",
                            showConfirmButton: true,
                        });
                    }

                    this.create_errors = ''

                }).catch(({ response }) => {
                    console.log(response.data.errors)
                    this.create_errors = response.data.errors
                })

        },

        // EDIT
        updateCompany() {
            let existingObj = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();

            data.append('file', this.company_update.file);
            data.append('name', this.company_update.name);
            data.append('company_color', this.company_update.color);

            let url = "/dashboard/companies/" + this.company_update.id + "/update";

            axios
                .post(url, data, config)
                .then((response) => {

                    if (response.data.success == true) {

                        this.getCompanies()

                        document.getElementById("closeEdit").click();

                        Swal.fire({
                            position: 'bottom-end',
                            icon: "success",
                            title: "Společnost byla upravena",
                            showConfirmButton: false,
                            timer: 800,
                        });

                        console.log("updateCompany - Company byla upravena")

                        this.update_errors= ''

                    }

                    if (response.data.error == "exist") {

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Jméno je již použito",
                            showConfirmButton: true,
                        });

                        console.log("updateCompany - Company již existuje")

                    }

                    if (response.data.error == "unknown") {

                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Něco se nepovedlo",
                            showConfirmButton: true,
                        });

                        console.log("updateCompany - Company neznáma chyba")

                    }
                }).catch(({ response }) => {
                    console.log(response.data.errors)
                    this.update_errors = response.data.errors
                })
        },

        // DELETE
        deleteCompany() {
            let url = "/dashboard/companies/" + this.company.id + "/delete";

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
                        .post(url, this.company)
                        .then((response) => {


                            if (response.data.success == true) {

                                this.getCompanies()

                                Swal.fire({
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: 'Společnost byla smazána',
                                    showConfirmButton: false,
                                    timer: 800,
                                })
                            }
                        })
                    console.log("deleteCompany - Company byla smazána")

                } else {
                    console.log("deleteCompany - Company nebyla smazána")
                }
            })



        },

        getCompanies() {
            let url = '/axios/dashboard/companies/get_companies'

            axios
                .post(url)
                .then((response) => {

                    this.companies = response.data.companies;

                })

        }

    },


}
</script>

<style scoped>

</style>
