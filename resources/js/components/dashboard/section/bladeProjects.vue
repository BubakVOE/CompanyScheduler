<template>
    <div>
        <div class="container py-4 shadow-lg rounded-3">

            <nav>
                <header class="pb-3 mb-4 border-bottom d-flex justify-content-between ">

                    <div class="d-flex align-items-center text-dark text-decoration-none ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                        </svg>

                        <span class="fs-4 ms-2">Projekty</span>

                    </div>


                    <div class="bg bg-success rounded">
                        <button type="button" class="btn text-light" data-bs-toggle="modal"
                            data-bs-target="#createNewProject">
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
                                Přidat projekt
                            </span>
                        </button>
                    </div>

                </header>

                <!-- <div class="pb-3 mb-4 border-bottom d-flex justify-content-center flex-column align-items-center "> -->
                <div class="pb-3 mb-4 border-bottom d-grid  text-center">

                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-funnel" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                        </svg>
                        <span class="fs-4 ms-2">Filtr</span>
                    </div>

                    <div class="pt-5 pb-3 mb-4 d-flex justify-content-center align-items-center ">

                        <div class="d-grid">
                            <label class="mb-2">
                                Vyhledat projekty podle společnosti
                            </label>

                            <select v-model="select_company" @change="selectDate(select_company)">

                                <option value="all">
                                    Všechny
                                </option>

                                <template v-for="company in companies">
                                    <option :value="company.name">
                                        {{ company . name }}
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </nav>

            <table class="table table-striped table-hover ">
                <thead class="table-dark">
                    <tr class="text-center">

                        <th scope="col" class="col-1 text-uppercase">
                            Společnost
                        </th>

                        <th scope="col" class="col-1 text-uppercase">
                            ID
                        </th>

                        <th scope="col" class="col-1 text-uppercase">
                            Stav
                        </th>

                        <th scope="col" class="col-2 text-uppercase">
                            Název
                        </th>

                        <th scope="col" class="col-8 text-uppercase">
                            zaměstnanci
                        </th>

                        <th class="col-3 text-uppercase">
                            Edit
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <template v-if="projects_for_company.data == 'test'">
                        Společnost nemá žádné projekty
                    </template>

                    <template v-else v-for="project in projects_for_company.data">
                        <tr class="p-1 bg-white text-center">

                            <td class="flex align-items-center">
                                <a :href="'/dashboard/companies/' + project.company_id + '/projects'"
                                    class="text-white btn" :style="'background-color:' + project.color">
                                    {{ project . company_id }}
                                </a>
                            </td>

                            <td>
                                {{ project . id }}
                            </td>

                            <td class="">
                                <h5 v-if="project.is_done == 0"
                                    class="bg-danger px-2 py-1 bg-opacity-25 border-2 border-danger rounded-3">
                                    rozdělané
                                </h5>
                                <h5 v-else class="bg-success px-2 py-1 bg-opacity-25 border-2 border-success rounded-3">
                                    hotové
                                </h5>
                            </td>

                            <td>
                                {{ project . name }}
                            </td>

                            <td>

                                <div class="d-flex flex-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-person-plus text-success fw-bold" viewBox="0 0 16 16">
                                        <path
                                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>

                                    <div v-for="user in project.users"
                                        class="mx-2 d-flex justify-content-center align-items-center w-auto h-auto me-4">

                                        <div class="d-flex flex-column">

                                            <span>
                                                {{ user . first_name }} {{ user . last_name }}
                                            </span>

                                            <div class="d-flex">


                                                <div class="col">
                                                    <a class="btn btn-primary w-25" data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="Zobrazit uživatele"
                                                        :href="'/employee/' + user.id + '/show'" target="_blank">
                                                    </a>
                                                </div>

                                                <form @submit.prevent="deleteUser" class="col">
                                                    <button type="submit" class="btn btn-danger w-25"
                                                        data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Odebrat uživatele"
                                                        @click="getIdsFromEdit(user, project)">
                                                    </button>
                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-col justify-content-center">
                                    <button type="button" class="btn btn-primary btn-outline-white"
                                        data-bs-toggle="modal" data-bs-target="#projectModalEdit"
                                        @click="projectData(project)">
                                        edit
                                    </button>

                                    <form @submit.prevent="removeProject">
                                        <button class="btn btn-danger mx-2" @click="getProjectId(project)">
                                            Smazat
                                        </button>
                                    </form>

                                    <template v-if="project.is_done == 0">
                                        <form @submit.prevent="projectCompleted()">
                                            <button class="btn btn-success" type="submit"
                                                @click="tableProject(project)">
                                                uzavřít
                                            </button>
                                        </form>
                                    </template>

                                    <template v-else>

                                        <form @submit.prevent="projectCompleted()">
                                            <button class="btn btn-secondary" type="submit"
                                                @click="tableProject(project)">
                                                otevřit
                                            </button>
                                        </form>

                                    </template>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- modal ADD -->
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
                            aria-label="Close"></button>
                    </div>

                    <form @submit.prevent="createNewProject">
                        <div class="modal-body p-5 col-10 container">
                            <div class="form-input mb-3 col-8 container">
                                <label>
                                    Přidat k firmě
                                    <span class="text-danger fw-bolder">
                                        *
                                    </span>
                                </label>

                                <select class="form-select" v-model="project_create.company_id">
                                    <template v-for="company in companies">
                                        <option :value="company.id">
                                            {{ company . name }}
                                        </option>
                                    </template>
                                </select>

                                <div v-if="errors.company_id"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . company_id[0] }}
                                </div>

                            </div>

                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Šternberk"
                                    v-model="project_create.name" />
                                <label for="floatingInput">
                                    Název projektu
                                    <span class="text-danger fw-bolder">
                                        *
                                    </span>
                                </label>

                                <div v-if="errors.name"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . name[0] }}
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Šternberk"
                                    v-model="project_create.type_of_job" />
                                <label for="floatingInput">
                                    Typ práce
                                    <span class="text-danger fw-bolder">*</span>
                                </label>

                                <div v-if="errors.type_of_job"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . type_of_job[0] }}
                                </div>

                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Vybíralova 19/4"
                                    v-model="project_create.street_address" />
                                <label for="floatingInput">
                                    street_address
                                    <span class="text-danger fw-bolder">*</span>
                                </label>

                                <div v-if="errors.street_address"
                                    class="alert alert-danger d-flex align-items-center invalid-feedback" role="alert">
                                    {{ errors . street_address[0] }}
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

        <!-- modal EDIT -->
        <div class="modal fade" id="projectModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center border-2 border-danger">
                        <button id="closeEdit" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!--    BODY      -->

                    <div class="container text-center">

                        <div class="row p-5">

                            <!--    UPDATE projekt      -->
                            <div class="col-sm-5 ">
                                <h1>
                                    Upravit informace
                                </h1>
                                <form @submit.prevent="updateProjectData">
                                    <div class="modal-body container bg-opacity-10 bg-dark">
                                        <div class="form-input mb-3 col-8 container">
                                            <label>
                                                Přiřazeno k firmě
                                                <span class="text-danger fw-bolder">
                                                    *
                                                </span>
                                            </label>

                                            <select class="form-select" v-model="project.company_id">
                                                <template v-for="company in companies">
                                                    <option :value="company.id">
                                                        {{ company . name }}
                                                    </option>
                                                </template>
                                            </select>

                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Šternberk" v-model="project.name" />
                                            <label for="floatingInput">
                                                Název projektu
                                                <span class="text-danger fw-bolder">
                                                    *
                                                </span>
                                            </label>

                                            <div v-if="update_errors.name"
                                                class="alert alert-danger d-flex align-items-center invalid-feedback"
                                                role="alert">
                                                {{ update_errors . name[0] }}
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Šternberk" v-model="project.type_of_job" />
                                            <label for="floatingInput">
                                                Typ práce
                                                <span class="text-danger fw-bolder">*</span>
                                            </label>

                                            <div v-if="update_errors.type_of_job"
                                                class="alert alert-danger d-flex align-items-center invalid-feedback"
                                                role="alert">
                                                {{ update_errors . type_of_job[0] }}
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Vybíralova 19/4" v-model="project.street_address" />
                                            <label for="floatingInput">
                                                street_address
                                                <span class="text-danger fw-bolder">*</span>
                                            </label>

                                            <div v-if="update_errors.street_address"
                                                class="alert alert-danger d-flex align-items-center invalid-feedback"
                                                role="alert">
                                                {{ update_errors . street_address[0] }}
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

                            <!--    ADD projekt      -->
                            <div class="col-sm-7 ">

                                <!--    přidat uživatele      -->
                                <template v-if="project.is_done == 0">
                                    <div>
                                        <h1>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="currentColor" class="bi bi-person-plus text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                <path fill-rule="evenodd"
                                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                            Přiřadit zaměstnance k projektu
                                        </h1>
                                        <div class="modal-body container bg-opacity-10 bg-dark ">

                                            <div class="card">
                                                <div class="card-body container ">
                                                    <div class="row">

                                                        <div class="col">
                                                            <h5>
                                                                Projekt
                                                            </h5>
                                                        </div>

                                                        <div class="col">

                                                            <h5>
                                                                Zaměstnanec
                                                            </h5>
                                                        </div>

                                                        <div class="col">
                                                            <h5>
                                                                Přidat
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <form class="row" @submit.prevent="newUserToProject">

                                                        <div class="col  ">
                                                            <h5>
                                                                {{ project . id }} - {{ project . name }}
                                                            </h5>
                                                            <input class="form-input invisible " readonly
                                                                :value="project.name"
                                                                :v-model="new_user.project_id = project.id" />
                                                        </div>

                                                        <div class="col">
                                                            <select v-model="new_user.user_id">
                                                                <option v-for="user in users" :value="user.id">
                                                                    {{ user . last_name }} {{ user . first_name }}
                                                                </option>

                                                            </select>

                                                            <template v-if="create_user_to_project_errors.user_id">
                                                                <p v-for="error in create_user_to_project_errors.user_id"
                                                                    class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    {{ error }}
                                                                </p>
                                                            </template>

                                                        </div>

                                                        <div class="col">
                                                            <button type="submit" class="btn btn-success">
                                                                Přidat
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </template>

                                <!--    Přidáni uživatelé      -->
                                <div class="mt-4">
                                    <h1>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            fill="currentColor" class="bi bi-people text-success" viewBox="0 0 16 16">
                                            <path
                                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                        </svg>
                                        Přidáni zaměstnanci
                                    </h1>

                                    <div class="modal-body container bg-opacity-10 bg-dark">
                                        <div class="card">
                                            <div class="card-body container">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>
                                                            ID
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            Jméno
                                                        </h5>
                                                    </div>

                                                    <div class="col">
                                                        <h5>
                                                            Detail
                                                        </h5>
                                                    </div>

                                                </div>

                                                <template v-for="user in project.users">

                                                    <div class="row bg-dark bg-opacity-10 align-items-center py-1 my-1">

                                                        <div class="col">
                                                            <h5>
                                                                {{ user . id }}
                                                            </h5>
                                                        </div>

                                                        <div class="col">
                                                            <h5>
                                                                {{ user . first_name }} {{ user . last_name }}
                                                            </h5>


                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <div class="me-1">
                                                                    <a class="btn btn-primary "
                                                                        :href="'/employee/' + user.id + '/show'"
                                                                        target="_blank">
                                                                        Show
                                                                    </a>
                                                                </div>

                                                                <div class="ms-1" v-if="project.is_done == 0">
                                                                    <form @submit.prevent="deleteUserFromProject">
                                                                        <button type="submit" class="btn btn-danger"
                                                                            @click="getIdsFromEdit(user, project)">
                                                                            smazat
                                                                            <!-- {{ user . id }}
                                                                    {{ project . id }} -->
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    <template v-if="error == 'exist'">
                                        <div class="alert alert-danger mt-5" role="alert">
                                            Uživatel byl již přidán
                                        </div>
                                    </template>

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
    name: "bladeProjects.vue",

    props: [
        "companies",
        "users",
    ],

    data() {
        return {

            errors: {},
            create_user_to_project_errors: {},

            update_errors: {},

            select_company: 'all',

            new_user: {
                user_id: "",
                project_id: "",
            },

            project_create: {
                company_id: null,
                name: '',
                type_of_job: '',
                street_address: '',
            },

            project: {
                id: 0,
                company_id: 0,
                name: "",
                type_of_job: "",
                street_address: 0,
                users: {},
                is_done: 0,
            },

            done_or_undone: 0,

            delete_ids_from_edit: {
                user_id: "",
                project_id: "",

            },

            get_project_id: "",

            projects: [],

            projects_for_company: [],

            error: "null",
        }
    },

    mounted() {
        this.new_user.project_id = this.project.id;

        this.get_projects_for_company();



        // this.select_company = this.companies[0]?.name;
    },

    methods: {
        projectData(project) {
            this.project.id = project.id;
            this.project.company_id = project.company_id;
            this.project.name = project.name;
            this.project.type_of_job = project.type_of_job;
            this.project.street_address = project.street_address;
            this.project.users = project.users;
            this.project.is_done = project.is_done;
        },

        getIdsFromEdit(user, project) {
            this.delete_ids_from_edit.user_id = user.id
            this.delete_ids_from_edit.project_id = project.id
        },

        tableProject(project) {
            this.done_or_undone = project.id;
        },

        getProjectId(project) {
            this.get_project_id = project.id
        },

        selectDate(select_company) {

            history.pushState({},
                null,
                window.location.origin + "/dashboard/projects?name=" + this.select_company
            );

            this.get_projects_for_company();

        },

        // // // // // // // // // // // // // // // 

        newUserToProject() {
            let url = "/dashboard/projects/" + this.project.id + "/newUserToProject"

            axios
                .post(url, this.new_user)
                .then((response) => {

                    if (response.data.success == true) {

                        // document.getElementById("closeEdit").click();
                        this.project.users.push({
                            id: response.data.user.id,
                            first_name: response.data.user.first_name,
                            last_name: response.data.user.last_name,
                        })

                        this.get_projects_for_company();

                        this.error = 'success'

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'success',
                            title: "Uživatel byl přidán do projektu",
                            showConfirmButton: false,
                            timer: 800,
                        })

                        this.error = ''
                        this.create_user_to_project_errors = ''

                        console.log("newUserToProject - Byl přidán uživatel")

                    } else if (response.data.success == 'exist') {

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'error',
                            title: "Uživatel již existuje",
                            showConfirmButton: true,
                        })

                        this.error = response.data.success

                        console.log("newUserToProject - Nepovedlo se přidat uživatele")

                    } else {

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'error',
                            title: "Nastala neznámá ",
                            showConfirmButton: true,
                        })

                        console.log("newUserToProject - Nastala neznámá chyba")

                    }
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.create_user_to_project_errors = response.data.errors
                })
        },

        deleteUserFromProject() {
            let user_id = this.delete_ids_from_edit.user_id
            let project_id = this.delete_ids_from_edit.project_id

            let url = "/dashboard/projects/" + project_id + "/user/" + user_id + "/removeUserFromProject";

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
                        .post(url, this.project.users)
                        .then((response) => {

                            if (response.data.success == true) {
                                document.getElementById("closeEdit").click();

                                // this.project.users.push({
                                //     id: response.data.user.id,
                                //     first_name: response.data.user.first_name,
                                //     last_name: response.data.user.last_name,
                                // })

                                this.get_projects_for_company()

                                Swal.fire({
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: "Uživatel byl úspešně odebrán",
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

        deleteUser() {
            let user_id = this.delete_ids_from_edit.user_id
            let project_id = this.delete_ids_from_edit.project_id

            let url = "/dashboard/projects/" + project_id + "/user/" + user_id + "/removeUserFromProject";

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
                        .post(url)
                        .then((response) => {

                            if (response.data.success == true) {

                                this.get_projects_for_company();

                                Swal.fire({
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: "Uživatel byl smazán",
                                    showConfirmButton: false,
                                    timer: 800,
                                })

                            }
                        })


                }
            })
        },

        // ProjectController
        createNewProject() {
            let url = "/dashboard/projects/createNewProject";

            axios
                .post(url, this.project_create)
                .then((response) => {

                    if (response.data.success == true) {

                        this.get_projects_for_company();

                        document.getElementById("closeCreate").click();

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'success',
                            title: "Projekt byl vytvořen",
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
                    this.errors = {};
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.errors = response.data.errors
                })
        },

        updateProjectData() {
            let url = "/dashboard/projects/" + this.project.id + "/update";

            axios
                .post(url, this.project)
                .then((response) => {

                    if (response.data.success == true) {

                        this.get_projects_for_company();

                        document.getElementById("closeEdit").click();

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'success',
                            title: "Projekt byl upraven",
                            showConfirmButton: false,
                            timer: 800,
                        })

                        console.log("updateProjectData - Project byl upraven")

                        this.update_errors = '';

                    } else {

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Jméno projektu je již použito",
                            showConfirmButton: true,
                        });

                        console.log("updateProjectData - Project NEBYL upraven")

                        this.update_errors = {};
                    }
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.update_errors = response.data.errors
                })
        },

        removeProject() {
            let url = "/dashboard/projects/" + this.get_project_id + "/delete";

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
                        .post(url)
                        .then((response) => {

                            if (response.data.success == true) {

                                this.get_projects_for_company()

                            }
                        })

                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: "Projekt byl úspěšně přidán",
                        showConfirmButton: false,
                        timer: 800,

                    })

                    console.log("updateProjectData - Project byl smazána")

                } else {
                    console.log("updateProjectData - NIC jsi nesmazal")
                }
            })

        },

        projectCompleted() {
            let url = "/dashboard/projects/" + this.done_or_undone + "/projectCompleted";

            axios
                .post(url, this.done_or_undone)
                .then((response) => {

                    this.get_projects_for_company();


                    if (response.data.is_done == 1) {

                        document.getElementById("closeEdit").click();

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: "Projekt byl úspěšně uzavřen",
                            showConfirmButton: false,
                            timer: 1500,
                        })

                        console.log("projectCompleted - Project je dodělán")

                    } else {

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Projekt byl znovu otevřen",
                            showConfirmButton: false,
                            timer: 1500,
                        });

                        console.log("projectCompleted - Project je otevřený")

                    }

                })
        },

        get_projects_for_company() {
            let url = '/axios/dashboard/projects/company/' + this.select_company + '/get_projects';

            axios
                .post(url)
                .then((response) => {

                    this.projects_for_company = response.data

                });

        },
    }
}
</script>

<style scoped>

</style>
