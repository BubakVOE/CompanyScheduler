<template>
    <div>
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

                        <span class="fs-4 ms-2">Společnost, projekt, uživatel</span>

                    </div>

                    <div class="bg bg-success rounded">
                        <!-- <button type="button" class="btn text-light" data-bs-toggle="modal"
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
                                Přidat 
                            </span>
                        </button> -->
                    </div>
                </header>
            </nav>

            <main class="bg-white p-5">
                <div class="py-5 text-center">
                    <h2>Krok po kroku</h2>

                    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg p-2">
                                <div
                                    class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                        class="bi bi-building" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                        <path
                                            d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="fs-2">Společnost</h3>
                                    <div class="d-grid ms-2">
                                        <div>
                                            <li :class="company_create.name ? 'text-success' : 'text-danger'"
                                                class="text-opacity-75 mt-1 ">
                                                název
                                            </li>

                                            <li :class="company_create.file ? 'text-success' : 'text-danger'"
                                                class="text-opacity-75 mt-1 ">
                                                logo
                                            </li>

                                            <li :class="company_create.color ? 'text-success' : 'text-danger'"
                                                class="text-opacity-75 mt-1 ">
                                                barva
                                            </li>
                                        </div>
                                    </div>

                                    <button class="mt-2 btn btn-secondary " data-bs-toggle="modal"
                                        data-bs-target="#createNewCompany">
                                        Edit
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg p-2">
                                <div
                                    class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                                        <path
                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                        <path
                                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="fs-2">Projekt</h3>
                                    <div class="d-grid ms-2">
                                        <li :class="project_create.name ? 'text-success' : 'text-danger'"
                                            class="text-opacity-75 mt-1 ">
                                            název
                                        </li>
                                        <li :class="project_create.type_of_job ? 'text-success' : 'text-danger'"
                                            class="text-opacity-75 mt-1 ">
                                            type of job
                                        </li>
                                        <li :class="project_create.street_address ? 'text-success' : 'text-danger'"
                                            class="text-opacity-75 mt-1 ">
                                            street_address
                                        </li>
                                    </div>

                                    <button class="mt-2 btn btn-secondary " data-bs-toggle="modal"
                                        data-bs-target="#createNewProject">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg p-2">
                                <div
                                    class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                        class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="fs-2">Uživatelé</h3>

                                    <div class="d-grid ms-2">
                                        <template v-if="add_employee != ''">
                                            <li class="text-success text-opacity-75">
                                                uživatel
                                            </li>
                                        </template>

                                        <template v-else>
                                            <li class="text-danger text-opacity-75">
                                                uživatel
                                            </li>
                                        </template>
                                    </div>

                                    <button class="mt-2 btn btn-secondary " data-bs-toggle="modal"
                                        data-bs-target="#addUserToProject">
                                        Edit
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 w-50 mx-auto">
                        <div class="d-flex flex-column fs-4 justify-content-center align-items-center">
                            <template v-if="
                                company_create.name !=='' &&
                                company_create.color !=='' &&
                                company_create.file !== null &&
                                project_create.name !=='' &&
                                project_create.type_of_job !=='' &&
                                project_create.street_address !=='' &&
                                add_employee[0] 
                            ">

                                <h1 class="fs-4 text-success">
                                    Veškéré informace jsou vyplněné
                                </h1>
                                <button type="submit" class="btn btn-success" @click="processStore()">
                                    Vytvořit
                                </button>

                            </template>

                            <template v-else>
                                <h1 class="fs-4 text-danger border-4 border-bottom border-danger">
                                    Vyplň všechny červeně svítící informace
                                </h1>
                            </template>

                        </div>
                    </div>

                </div>

            </main>


            <!-- modal -->
            <div>
                <div class="modal fade" id="createNewCompany" tabindex="-1" aria-labelledby="createNewCompany"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center border-2 border-danger">
                                <h5 class="modal-title border-2 border-danger">
                                    Vytvořit novou společnost
                                </h5>

                                <button type="button" id="closeCreate" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-8 p-5">

                                        <form @submit.prevent="" enctype="multipart/form-data">

                                            <div>
                                                <label>
                                                    Název společnosti
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="text" class="form-control" v-model="company_create.name"
                                                    placeholder="název společnosti" name="name">

                                            </div>

                                            <div class="py-3">
                                                <input type="file" class="form-control" v-on:change="onChange">
                                            </div>

                                            <div class="py-3">
                                                <label class="labels">
                                                    company color - {{ company_create.color }}
                                                </label>

                                                <input type="color" v-model="company_create.color" class="">
                                            </div>

                                            <div class="modal-footer mt-5">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                                    Zavřít
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="createNewProject" tabindex="-1" aria-labelledby="createNewProject"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center border-2 border-danger">
                                <h5 class="modal-title border-2 border-danger">
                                    modal
                                </h5>

                                <h4 class="text-center d-flex justify-content-center mx-5">
                                    Vytvořit nový projekt
                                </h4>
                                <button id="closeCreate" type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>

                            <!--    UPDATE projekt      -->
                            <form @submit.prevent="createNewProject">
                                <div class="modal-body p-5 col-10 container">

                                    <div class="form-floating mb-3 ">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="Šternberk" v-model="project_create.name" required />
                                        <label for="floatingInput">
                                            Název projektu
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="Šternberk" v-model="project_create.type_of_job" required />
                                        <label for="floatingInput">
                                            Vykonaná práce
                                            <span class="text-danger fw-bolder">*</span>
                                        </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="Vybíralova 19/4" v-model="project_create.street_address"
                                            required />
                                        <label for="floatingInput">
                                            street_address
                                            <span class="text-danger fw-bolder">*</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Zavřít
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addUserToProject" tabindex="-1" aria-labelledby="addUserToProject"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center border-2 border-danger">
                                <h5 class="modal-title border-2 border-danger">
                                    modal
                                </h5>

                                <h4 class="text-center d-flex justify-content-center mx-5">
                                    Přiřadit uživatele k projektu
                                </h4>

                                <button id="closeCreate" type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body ">
                                <div class="list-group mx-0 w-auto" v-for="user in users">

                                    <label class="list-group-item d-flex gap-2 mt-1 mb-1">
                                        <input class="form-check-input flex-shrink-0" type="checkbox" :value="user.id"
                                            v-model="add_employee">

                                        <span>
                                            {{ user.first_name }} {{ user.last_name }}
                                        </span>
                                    </label>

                                </div>
                            </div>

                            <div class="modal-footer mt-5">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                    Zavřít
                                </button>
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
        'users',
    ],

    data() {
        return {
            company_create: {
                name: "",
                file: null,
                color: "",
            },

            project_create: {
                name: '',
                type_of_job: '',
                street_address: '',
            },

            add_employee: [],

        }
    },

    computed() {
        this.project_create.company_name = this.company_create.name
    },

    mounted() {

    },


    methods: {

        onChange(e) {
            this.company_create.file = e.target.files[0];
        },

        processStore() {
            let url = "/dashboard/process/processStore"

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();

            data.append('company_name', this.company_create.name);
            data.append('company_file', this.company_create.file);
            data.append('company_color', this.company_create.color);
            data.append('project_name', this.project_create.name);
            data.append('project_type_of_job', this.project_create.type_of_job);
            data.append('project_street_address', this.project_create.street_address);
            data.append('user_id', this.add_employee);

            axios
                //.post(url, [this.company_create, this.project_create, this.add_employee, data, config])
                .post(url, data, config)
                .then((response) => {
                    if (response.data.success == true) {

                        Swal.fire({
                            position: 'bottom-end',
                            icon: "success",
                            title: "Uspěšně vytvořeno",
                            showConfirmButton: false,
                            timer: 800,
                        });

                        window.location.href = '/dashboard/companies/'+ response.data.company;

                        console.log("processStore - Uspěšně data vytvořena")
                    }
                })

        },



    }

}

</script>





