<template>
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">
                    {{ company . name }}
                </h1>
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

                <div class="col mb-4 ">
                    <div class="h-100 card rounded-3 shadow-sm rounded border-success">
                        <div class="card-body d-flex justify-content-center align-items-center">

                            <button type="button" class="btn btn-outline-none" data-bs-toggle="modal"
                                data-bs-target="#createNewProject">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor"
                                    class="bi bi-plus-square btn-success " viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <template v-for="project in company.projects">
                    <div class="col mb-4 ">
                        <div class="h-100 card rounded-3 shadow-sm rounded border-success">

                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">
                                    {{ project . name }}
                                </h4>
                            </div>

                            <div class="card-body">
                                <template v-if="project.is_done == 1">
                                    <h1 class="card-title pricing-card-title fw-light text-success">
                                        Dodělané
                                    </h1>
                                </template>

                                <template v-else>
                                    <h1 class="card-title pricing-card-title fw-light text-danger">
                                        rozdělané
                                    </h1>
                                </template>

                                <template v-for="user in project.users">
                                    <ul class="list-unstyled mt-1 mb-1">
                                        <li>
                                            {{ user . first_name }} {{ user . last_name }}
                                        </li>
                                    </ul>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>

            </div>

        </main>

    </div>

    <!-- ADD projekt -->
    <div class="modal fade" id="createNewProject" tabindex="-1" aria-labelledby="createNewProject" aria-hidden="true">
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
                        aria-label="Close"></button>
                </div>

                <!--    UPDATE projekt      -->
                <form @submit.prevent="createNewProject">
                    <div class="modal-body p-5 col-10 container">

                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Šternberk"
                                v-model="project_create.company_id" required />
                            <label for="floatingInput">
                                Název projektu
                                {{ project_create.company_id = company.id }}
                                <span class="text-danger fw-bolder">
                                    *
                                </span>
                            </label>
                        </div>

                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Šternberk"
                                v-model="project_create.name" required />
                            <label for="floatingInput">
                                Název projektu
                                <span class="text-danger fw-bolder">
                                    *
                                </span>
                            </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Šternberk"
                                v-model="project_create.type_of_job" required />
                            <label for="floatingInput">
                                Vykonaná práce
                                <span class="text-danger fw-bolder">*</span>
                            </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Vybíralova 19/4"
                                v-model="project_create.street_address" required />
                            <label for="floatingInput">
                                street_address
                                <span class="text-danger fw-bolder">*</span>
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer mt-5">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Zavřít
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Uložit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "projectsOfCompany",

    data() {
        return {
            company: [],

            projects_for_company: [],

            project_create: {
                company_id: 0,
            },
        }
    },

    mounted() {

        this.get_projects_for_company();
    },

    methods: {
        createNewProject() {
            let url = "/dashboard/projects/createNewProject";

            axios
                .post(url, this.project_create)
                .then((response) => {

                    if (response.data.success == true) {

                        this.get_projects_for_company()


                        document.getElementById("closeCreate").click();

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: "Projekt byl úspěšně přidán",
                            showConfirmButton: false,
                            timer: 800,
                        })

                        console.log("createNewProject - Project byl přidán")

                    } else {

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Jméno projektu je již použito",
                            showConfirmButton: true,
                        });

                        console.log("createNewProject - Project nebyl přidán")

                    }
                });
        },

        get_projects_for_company() {

            let url = '/axios' + window.location.pathname + '/get_projects';

            axios
                .post(url)
                .then((response) => {

                    this.company = response.data.company_relations
                    this.projects_for_company = response.data.projects

                })
        },

    }



}
</script>
