<template>
    <div>
        <div class="container py-4 shadow-lg rounded-3">
            <header class="pb-3 mb-4 border-bottom d-flex justify-content-between ">
                <div class="d-flex align-items-center text-dark text-decoration-none ">

                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>

                    <span class="fs-4 ms-2">Zaměstnanci</span>
                </div>

                <div class="bg bg-success rounded">
                    <button type="button" class="btn text-light" data-bs-toggle="modal"
                        data-bs-target="#createNewUsers">
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
                            Přidat zaměstnance
                        </span>
                    </button>
                </div>
            </header>

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

                    <div class="d-grid ms-5 me-5">
                        <label class="mb-2">
                            společnost
                        </label>

                        <select v-model="company_name" @change="getEmployees()">
                            <option value="all">
                                všechny
                            </option>

                            <template v-for="company in companies">
                                <option :value="company.name">
                                    {{ company.name }}
                                </option>
                            </template>
                        </select>
                    </div>

                    <div v-if="company_name !== 'all'" class="d-grid ms-5 me-5">
                        <label class="mb-2">
                            projekt
                        </label>

                        <select v-model="project_name" @change="getEmployees()">
                            <option value="all">
                                všechny
                            </option>

                            <template v-for="project in company_projects">
                                <option :value="project.name">
                                    {{ project.name }}
                                </option>
                            </template>
                        </select>

                    </div>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col" class="col-1 text-uppercase">
                                ID
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                role
                            </th>

                            <th scope="col" class="col-2 text-uppercase">
                                Jméno
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                Email
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                Přezdívka
                            </th>

                            <th scope="col" class="col-1 text-uppercase">
                                Addresa
                            </th>

                            <th scope="col" class="col-2 text-uppercase">
                                telefonní číslo
                            </th>

                            <th scope="col" class="col-1">
                                kč/h
                            </th>

                            <th class="col-4 text-uppercase">
                                Edit
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <template v-if="project_employees">
                            <template v-for="employees in project_employees">
                                <tr v-for="employee in employees.users" :key="employee"
                                    class="p-1 bg-white text-center">
                                    <td class="fw-bolder">
                                        {{ employee . id }}
                                    </td>

                                    <td class="">
                                        <h5 v-if="employee.is_admin == 1"
                                            class="bg-danger py-1 bg-opacity-25 border-2 border-danger rounded-3">
                                            admin
                                        </h5>
                                        <h5 v-else
                                            class="bg-success px-2 py-1 bg-opacity-25 border-2 border-success rounded-3">
                                            uživatel
                                        </h5>
                                    </td>

                                    <td>
                                        {{ employee . first_name }}
                                        {{ employee . last_name }}
                                    </td>

                                    <td>
                                        {{ employee . email }}
                                    </td>

                                    <td>
                                        {{ employee . username }}
                                    </td>

                                    <td>
                                        {{ employee . address }} - {{ employee . apartment }}
                                    </td>

                                    <td>

                                        <template v-if="employee.mobile == 0" class="">
                                            <span class="text-muted">
                                                neuvedeno
                                            </span>
                                        </template>

                                        <template v-else>
                                            {{ employee . mobile }}
                                        </template>
                                    </td>

                                    <td class="text-success">
                                        {{ employee . money_per_hour }},-
                                    </td>

                                    <td class="">
                                        <div class="d-flex justify-content-center">
                                            <form @submit.prevent="deleteEmployee" class="mx-2">
                                                <button class="btn btn-danger" type="submit"
                                                    @click="getEmployeeId(employee)">
                                                    Smazat
                                                </button>
                                            </form>

                                            <a class="btn btn-secondary" :href="'/employee/' + employee.id + '/overall'"
                                                target="_blank">
                                                Zobrazit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </template>

                        <template v-else>
                            <tr v-for="employee in employees" :key="employee" class="p-1 bg-white text-center">
                                <td class="fw-bolder">
                                    {{ employee . id }}
                                </td>

                                <td class="">
                                    <h5 v-if="employee.is_admin == 1"
                                        class="bg-danger py-1 bg-opacity-25 border-2 border-danger rounded-3">
                                        admin
                                    </h5>
                                    <h5 v-else
                                        class="bg-success px-2 py-1 bg-opacity-25 border-2 border-success rounded-3">
                                        uživatel
                                    </h5>
                                </td>

                                <td>
                                    {{ employee . first_name }}
                                    {{ employee . last_name }}
                                </td>

                                <td>
                                    {{ employee . email }}
                                </td>

                                <td>
                                    {{ employee . username }}
                                </td>

                                <td>
                                    {{ employee . address }} - {{ employee . apartment }}
                                </td>

                                <td>

                                    <template v-if="employee.mobile == 0" class="">
                                        <span class="text-muted">
                                            neuvedeno
                                        </span>
                                    </template>

                                    <template v-else>
                                        {{ employee . mobile }}
                                    </template>
                                </td>

                                <td class="text-success">
                                    {{ employee . money_per_hour }},-
                                </td>

                                <td class="">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editUser" @click="userEdit(employee)">
                                            Edit
                                        </button>

                                        <form @submit.prevent="deleteEmployee" class="mx-2">
                                            <button class="btn btn-danger" type="submit"
                                                @click="getEmployeeId(employee)">
                                                Smazat
                                            </button>
                                        </form>

                                        <a class="btn btn-secondary" :href="'/employee/' + employee.id + '/overall'"
                                            target="_blank">
                                            Zobrazit
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </template>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- modal Vytvořit nového uživatele -->
        <div class="modal fade" id="createNewUsers" tabindex="-1" aria-labelledby="createNewUsers" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center border-2 border-danger">
                        <h5 class="modal-title border-2 border-danger">
                            modal
                        </h5>

                        <h4 class="text-center d-flex justify-content-center mx-5">
                            Vytvořit nového uživatele
                        </h4>
                        <button id="closeCreate" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>


                    <!--    UPDATE projekt      -->
                    <form @submit.prevent="createEmployee" class="p-5">

                        <div class="row">

                            <div class="col">

                                <h1 class="text-center">
                                    Základní informace
                                </h1>

                                <div class="modal-body container d-flex">

                                    <div class="me-2">

                                        <label>
                                            Jméno
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="text" class="form-control" placeholder="Tomas" name="first_name"
                                            v-model="modal_create_employee.first_name" />

                                        <template v-if="create_user_errors.first_name">
                                            <p v-for="error in create_user_errors.first_name"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                    <div class="ms-2 ">

                                        <label>
                                            Příjmení
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="text" class="form-control" placeholder="Novak" name="last_name"
                                            v-model="modal_create_employee.last_name" />

                                        <template v-if="create_user_errors.last_name">
                                            <p v-for="error in create_user_errors.last_name"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                </div>

                                <div class="modal-body container col-8">
                                    <div class="me-2">

                                        <label>
                                            Přezdívka
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="text" class="form-control" placeholder="Genius"
                                            v-model="modal_create_employee.username" />

                                        <template v-if="create_user_errors.username">
                                            <p v-for="error in create_user_errors.username"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>
                                </div>

                                <div class="modal-body container col-8">
                                    <div class="me-2">

                                        <label>
                                            Email
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="text" class="form-control" placeholder="tomasnovak@seznam.cz"
                                            name="email" v-model="modal_create_employee.email" />

                                        <template v-if="create_user_errors.email">
                                            <p v-for="error in create_user_errors.email"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>
                                    </div>
                                </div>

                                <div class="modal-body container col-8">
                                    <div class="me-2">

                                        <label>
                                            Telefon
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="number" class="form-control" placeholder="111 222 333"
                                            name="mobile" v-model="modal_create_employee.mobile"
                                            autocomplete="mobile" />

                                        <template v-if="create_user_errors.mobile">
                                            <p v-for="error in create_user_errors.mobile"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>
                                </div>

                                <div class="modal-body container d-flex">
                                    <div class="me-2">

                                        <label>
                                            Heslo
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="password" class="form-control" placeholder="*********"
                                            v-model="modal_create_employee.password" />
                                    </div>

                                    <div class="ms-2">

                                        <label>
                                            Znovu heslo
                                            <span class="text-danger fw-bolder">
                                                *
                                            </span>
                                        </label>

                                        <input type="password" class="form-control" placeholder="*********"
                                            v-model="modal_create_employee.password_confirmation" />

                                        <template v-if="create_user_errors.password">

                                            <p v-for="error in create_user_errors.password"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                </div>
                            </div>

                            <div class="col">

                                <h1 class="text-center">
                                    Dodatečné info
                                </h1>

                                <div class="modal-body container d-grid">
                                    <label>
                                        Bydliště
                                    </label>

                                    <input type="text" class="form-control" placeholder="Vybiralova"
                                        v-model="modal_create_employee.address" />

                                    <template v-if="create_user_errors.address">
                                        <p v-for="error in create_user_errors.address"
                                            class="alert alert-danger d-flex align-items-center" role="alert">
                                            {{ error }}
                                        </p>
                                    </template>

                                </div>

                                <div class="d-flex">
                                    <div class="modal-body container d-grid col-7">
                                        <label>
                                            Číslo bytu
                                        </label>

                                        <input type="text" class="form-control" placeholder="19/4"
                                            v-model="modal_create_employee.apartment" />

                                        <template v-if="create_user_errors.apartment">
                                            <p v-for="error in create_user_errors.apartment"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>

                                    <div class="modal-body container d-grid col-5">

                                        <label>
                                            kč/h
                                        </label>

                                        <input type="number" class="form-control" placeholder="150"
                                            v-model="modal_create_employee.money_per_hour" />

                                        <template v-if="create_user_errors.money_per_hour">
                                            <p v-for="error in create_user_errors.money_per_hour"
                                                class="alert alert-danger d-flex align-items-center" role="alert">
                                                {{ error }}
                                            </p>
                                        </template>

                                    </div>
                                </div>

                                <div class="modal-body container d-grid ">

                                    <label>
                                        Hodnost
                                    </label>

                                    <div>
                                        <input class="mx-2" type="radio" id="one" value="1"
                                            v-model="modal_create_employee.is_admin" />
                                        <label for="one">admin</label>
                                    </div>

                                    <div>

                                        <input class="mx-2" type="radio" id="two" value="0"
                                            v-model="modal_create_employee.is_admin" />
                                        <label for="two">uživatel</label>
                                    </div>
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

        <!--  modal EDIT uživatele -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
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

                                <form @submit.prevent="updateEmployee">
                                    <div class="modal-body container bg-opacity-10 bg-dark">


                                        <div class="modal-body container d-flex">

                                            <div class="me-2">
                                                <label>
                                                    Jméno
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="text" class="form-control" placeholder="Tomas"
                                                    v-model="modal_update_employee.first_name" />
                                            </div>

                                            <div class="ms-2 ">

                                                <label>
                                                    Příjmení
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="text" class="form-control" placeholder="Novak"
                                                    v-model="modal_update_employee.last_name" />

                                                <template v-if="update_user_errors.last_name">

                                                    <p v-for="error in update_user_errors.last_name"
                                                        class="alert alert-danger d-flex align-items-center"
                                                        role="alert">
                                                        {{ error }}
                                                    </p>
                                                </template>

                                            </div>

                                        </div>

                                        <div class="modal-body container d-flex">

                                            <div class="me-2">
                                                <label>
                                                    heslo
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="password" class="form-control" placeholder="*********"
                                                    v-model="modal_update_employee.password" />
                                            </div>

                                            <div class="ms-2 ">

                                                <label>
                                                    potvrzení hesla
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="password" class="form-control"
                                                    v-model="modal_update_employee.password_confirmation" />

                                                <template v-if="update_user_errors.password">

                                                    <p v-for="error in update_user_errors.password"
                                                        class="alert alert-danger d-flex align-items-center"
                                                        role="alert">
                                                        {{ error }}
                                                    </p>
                                                </template>

                                            </div>

                                        </div>


                                        <div class="modal-body container col-8">
                                            <div class="me-2">

                                                <label>
                                                    Přezdívka
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="text" class="form-control" placeholder="Genius"
                                                    v-model="modal_update_employee.username" />


                                                <template v-if="update_user_errors.username">

                                                    <p v-for="error in update_user_errors.username"
                                                        class="alert alert-danger d-flex align-items-center"
                                                        role="alert">
                                                        {{ error }}
                                                    </p>
                                                </template>


                                            </div>
                                        </div>

                                        <div class="modal-body container col-8">
                                            <div class="me-2">

                                                <label>
                                                    Email
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="text" class="form-control"
                                                    placeholder="tomasnovak@seznam.cz" name="email" autocomplete="email"
                                                    v-model="modal_update_employee.email" />


                                                <template v-if="update_user_errors.email">

                                                    <p v-for="error in update_user_errors.email"
                                                        class="alert alert-danger d-flex align-items-center"
                                                        role="alert">
                                                        {{ error }}
                                                    </p>
                                                </template>

                                            </div>
                                        </div>

                                        <div class="modal-body container col-8">
                                            <div class="me-2">

                                                <label>
                                                    Telefon
                                                    <span class="text-danger fw-bolder">
                                                        *
                                                    </span>
                                                </label>

                                                <input type="text" class="form-control" placeholder="111 222 333"
                                                    name="email" autocomplete="mobile"
                                                    v-model="modal_update_employee.mobile" />


                                                <template v-if="update_user_errors.mobile">

                                                    <p v-for="error in update_user_errors.mobile"
                                                        class="alert alert-danger d-flex align-items-center"
                                                        role="alert">
                                                        {{ error }}
                                                    </p>
                                                </template>

                                            </div>
                                        </div>


                                        <div class="modal-body container mt-5 d-grid">
                                            <h1 class="text-center">
                                                Dodatečné info
                                            </h1>

                                            <div class="modal-body  ">
                                                <div class="me-2">

                                                    <label>
                                                        mzda na hodinu
                                                    </label>

                                                    <input type="number" class="form-control" placeholder="150"
                                                        v-model="modal_update_employee.money_per_hour" />


                                                    <template v-if="update_user_errors.money_per_hour">

                                                        <p v-for="error in update_user_errors.money_per_hour"
                                                            class="alert alert-danger d-flex align-items-center"
                                                            role="alert">
                                                            {{ error }}
                                                        </p>
                                                    </template>

                                                </div>

                                                <div class="me-2">

                                                    <label>
                                                        Bydliště
                                                    </label>

                                                    <input type="text" class="form-control" placeholder="150"
                                                        v-model="modal_update_employee.address" />


                                                    <template v-if="update_user_errors.address">

                                                        <p v-for="error in update_user_errors.address"
                                                            class="alert alert-danger d-flex align-items-center"
                                                            role="alert">
                                                            {{ error }}
                                                        </p>
                                                    </template>

                                                </div>

                                                <div class="me-2">

                                                    <label>
                                                        číslo bytu
                                                    </label>

                                                    <input type="text" class="form-control" placeholder="150"
                                                        v-model="modal_update_employee.apartment" />


                                                    <template v-if="update_user_errors.apartment">

                                                        <p v-for="error in update_user_errors.apartment"
                                                            class="alert alert-danger d-flex align-items-center"
                                                            role="alert">
                                                            {{ error }}
                                                        </p>
                                                    </template>

                                                </div>

                                                <div class=" d-grid">
                                                    <div>
                                                        <input class="mx-2" type="radio" id="one" value="1"
                                                            v-model="modal_update_employee.is_admin" />
                                                        <label for="one">admin</label>
                                                    </div>

                                                    <div>

                                                        <input class="mx-2" type="radio" id="two" value="0"
                                                            v-model="modal_update_employee.is_admin" />
                                                        <label for="two">uživatel</label>
                                                    </div>
                                                </div>

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
                                    </div>

                                </form>

                            </div>

                            <div class="col-sm-7 ">

                                <!--    přidat uživatele      -->
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
                                        Přiřadit projekt k uživatelovi
                                    </h1>
                                    <div class="modal-body container bg-opacity-10 bg-dark ">

                                        <div class="card">
                                            <div class="card-body container ">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>
                                                            Zaměstnanec
                                                        </h5>
                                                    </div>

                                                    <div class="col">
                                                        <h5>
                                                            Projekt
                                                        </h5>
                                                    </div>

                                                    <div class="col">
                                                        <h5>
                                                            Přidat
                                                        </h5>
                                                    </div>
                                                </div>

                                                <form class="row" @submit.prevent="newUserToProject">
                                                    <div class="col">
                                                        {{ modal_update_employee . id }}
                                                        <span style="font-weight: bolder;">-</span>

                                                        {{ modal_update_employee . last_name }}
                                                        {{ modal_update_employee . first_name }}

                                                        <input class="form-input invisible " readonly
                                                            :v-model="modal_add_user_to_project.user_id = modal_update_employee.id" />

                                                    </div>

                                                    <div class="col">

                                                        <select v-model="modal_add_user_to_project.project_id">
                                                            <template v-for="project in projects">
                                                                <option :value="project.id">
                                                                    {{ project . name }}
                                                                </option>
                                                            </template>
                                                        </select>

                                                        <template v-if="create_user_to_project_errors.project_id">
                                                            <p v-for="error in create_user_to_project_errors.project_id"
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

                                <form>
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

                                                <template v-for="project in  modal_update_employee.projects">

                                                    <div class="row bg-dark bg-opacity-10 align-items-center py-1 my-1">

                                                        <div class="col">
                                                            <h5>
                                                                {{ project . id }}
                                                            </h5>
                                                        </div>

                                                        <div class="col">
                                                            <h5>
                                                                {{ project . name }}
                                                            </h5>
                                                        </div>

                                                        <div class="col">
                                                            <form @submit.prevent="deleteUserFromProject">
                                                                <button type="submit" class="btn btn-danger"
                                                                    @click="getModalIdsFromAddNewUser(project, modal_update_employee)">
                                                                    smazat
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>

                                                </template>
                                            </div>
                                        </div>

                                    </div>

                                </form>
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
    name: "bladeEmployee",

    props: [
        'projects'
    ],

    data() {
        return {
            employees: {},
            project_employees: {},
            companies: {},
            company_projects: {},

            company_name: 'all',
            project_name: 'all',


            modal_add_user_to_project: {},

            modal_update_employee: {},

            modal_create_employee: {
                is_admin: 0,
                money_per_hour: 150,
            },

            get_employee_id: 0,


            delete_user_from_project: {
                user_id: "",
                project_id: "",

            },

            create_user_errors: {},

            update_user_errors: {},

            create_user_to_project_errors: {},
        }
    },

    mounted() {
        this.getEmployees()
    },

    methods: {
        getEmployeeId(employee) {
            this.get_employee_id = employee.id
        },

        userEdit(employee) {
            this.modal_update_employee = employee
        },

        getEmployees() {
            let url = '/axios/dashboard/employees/get_employees'

            let data = new FormData();

            data.append('company_name', this.company_name);
            data.append('project_name', this.project_name);


            axios
                .post(url, data)
                .then((response) => {
                    this.employees = response.data.employees
                    this.project_employees = response.data.project_employees
                    this.companies = response.data.companies
                    this.company_projects = response.data.company_projects
                })
        },

        deleteEmployee() {
            let url = "/dashboard/employees/" + this.get_employee_id + "/deleteEmployee";

            Swal.fire({
                title: 'Are you sure?',
                text: "tahle akce je nevratná!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Smazat!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Zrušit!'
            }).then((result) => {
                if (result.isConfirmed) {

                    axios
                        .post(url)
                        .then((response) => {

                            if (response.data.success == true) {

                                this.getEmployees()

                            }
                        })

                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: "Uživatel byl úspěšně odebrán",
                        showConfirmButton: false,
                        timer: 800,
                    })
                }
            })
        },

        getModalIdsFromAddNewUser(project, modal_update_employee) {
            this.delete_user_from_project.user_id = modal_update_employee.id
            this.delete_user_from_project.project_id = project.id
        },

        newUserToProject() {
            let url = "/dashboard/projects/" + this.modal_add_user_to_project.project_id + "/newUserToProject"

            console.log(url)

            axios
                .post(url, this.modal_add_user_to_project)
                .then((response) => {


                    if (response.data.success == true) {

                        document.getElementById("closeEdit").click();

                        this.getEmployees()

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'success',
                            title: "Projekt byl úspěšně přidán",
                            showConfirmButton: false,
                            timer: 800,
                        })

                        console.log("newUserToProject - Byl přidán uživatel")

                    } else if (response.data.success == 'exist') {

                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'error',
                            title: "Uživatel již je přiřazen k projektu",
                            showConfirmButton: true,
                        })

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
            let user_id = this.delete_user_from_project.user_id
            let project_id = this.delete_user_from_project.project_id

            let url = "/dashboard/projects/" + project_id + "/user/" + user_id + "/removeUserFromProject";

            Swal.fire({
                title: 'Are you sure?',
                text: "tahle akce je nevratná!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Smazat!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Zrušit!'
            }).then((result) => {
                if (result.isConfirmed) {

                    axios
                        .post(url)
                        .then((response) => {

                            if (response.data.success == true) {

                                document.getElementById("closeEdit").click();

                                this.getEmployees()
                            }
                        })

                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: "Uživatel byl úspěšně odebrán",
                        showConfirmButton: false,
                        timer: 800,
                    })
                }
            })
        },

        updateEmployee() {
            let url = "/dashboard/employee/" + this.modal_update_employee.id + "/updateEmployee";

            axios
                .post(url, this.modal_update_employee)
                .then((response) => {
                    if (response.data.success == true) {

                        this.getEmployees()

                        document.getElementById("closeEdit").click();

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data byly změněny',
                            showConfirmButton: false,
                            timer: 1000
                        })


                        this.update_user_errors= ''
                    }
                    if (response.data.success == false) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: true,
                        })
                    }
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.update_user_errors = response.data.errors
                })
        },

        createEmployee() {
            let url = "/dashboard/employees/createEmployee"

            axios
                .post(url, this.modal_create_employee)
                .then((response) => {
                    console.log(response.data.errors)

                    this.getEmployees()

                    document.getElementById("closeCreate").click();

                    if (response.data.success == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Uživatel byl vytvořen',
                            showConfirmButton: false,
                            timer: 1000
                        })

                        this.create_user_errors = ''
                    }
                }).catch(({
                    response
                }) => {
                    console.log(response.data.errors)
                    this.create_user_errors = response.data.errors
                })
        },



    }



}


</script>

<style scoped>

</style>
