<!--  MODAL MODAL MODAL  -->
<div>
    <!-- ADD společnost -->
    <div
        class="modal fade"
        id="createNewCompany"
        tabindex="-1"
        aria-labelledby="createNewCompany"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="py-4 text-uppercase">
                        Vytvořit novou společnost
                    </h4>

                    <button
                        type="button"
                        id="closeNewProject"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>

                <form
                    class="container col-10"
                    @submit.prevent="createNewCompany"
                >
                    <div class="modal-body">
                        <div class="mb-3 col-10 container">
                            <label
                                for="exampleInputEmail1"
                                class="form-label"
                            >
                                Název společnosti
                            </label>
                            <input
                                v-model="company_data.name"
                                name="employee"
                                type="text"
                                class="form-control"
                                aria-describedby="emailHelp"
                            />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            zavřít
                        </button>

                        <button
                            type="submit"
                            class="col-6 btn btn-success"
                        >
                            Přidat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT Společnosti -->
    <div
        class="modal fade bd-example-modal-lg"
        id="companyModalEdit"
        tabindex="-1"
        aria-labelledby="companyModalEdit"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="modal-header d-flex justify-content-center border-2 border-danger"
                >
                    <h4 class="py-4 text-uppercase">
                        Upravit název společnosti
                    </h4>
                    <button
                        id="test"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <!--   UPDATE projekt                 -->
                <form @submit.prevent="updateCompanyData">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                v-model="company_data.name"
                                required
                            />
                            <label for="floatingInput">
                                Název společnosti
                                <span class="text-danger fw-bolder"
                                >*</span
                                >
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer mt-5">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Zavřít
                        </button>

                        <button type="submit"
                                class="btn btn-success"
                        >
                            Uložit
                        </button>
                    </div>
                </form>

                <!--   DELETE uživatele                 -->
                <div class="modal-footer">

                    <div class="d-flex justify-content-around"
                         v-for="user in modal_project.users">
                        <h5 class="text-secondary mx-5">
                            {{ user.first_name }} {{ user.last_name }}
                        </h5>

                        <form @submit.prevent="removeUserFromProject">
                            <button
                                class="btn btn-dark btn-outline-danger"
                                type="submit"
                                @click="tableUser(user)"
                            >
                                Odebrat uživatele č. {{ user.id }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT projektu -->
    <div
        class="modal fade"
        id="testModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="modal-header d-flex justify-content-center border-2 border-danger"
                >
                    <h5 class="modal-title border-2 border-danger">
                        ID - {{ modal_project.id }}
                    </h5>

                    <h1
                        class="text-center d-flex justify-content-center mx-5"
                    >
                        {{ modal_project.name }}
                    </h1>
                    <button
                        id="test"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <!--   UPDATE projekt                 -->
                <form @submit.prevent="updateProjectData">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                placeholder="Šternberk"
                                v-model="modal_project.name"
                                required
                            />
                            <label for="floatingInput">
                                Název projektu
                                <span class="text-danger fw-bolder"
                                >*</span
                                >
                            </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                placeholder="Vybíralova 19/4"
                                v-model="modal_project.street_address"
                                required
                            />
                            <label for="floatingInput">
                                street_address
                                <span class="text-danger fw-bolder"
                                >*</span
                                >
                            </label>
                        </div>

                        <div class="d-flex justify-content-around">
                            <div class="form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingPassword"
                                    placeholder="59 30"
                                    v-model="
                                                modal_project.address_latitude
                                            "
                                />
                                <label for="floatingPassword">
                                    address_latitude
                                </label>
                            </div>

                            <div class="form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingPassword"
                                    placeholder="60 39"
                                    v-model="
                                                modal_project.address_longitude
                                            "
                                />
                                <label for="floatingPassword">
                                    address_longitude
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-5">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Zavřít
                        </button>

                        <form @submit.prevent="removeProjectData">
                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Smazat
                            </button>
                        </form>

                        <button type="submit" class="btn btn-primary">
                            Uložit
                        </button>
                    </div>
                </form>

                <!--   ADD uživatele                 -->
                <form
                    class="modal-footer d-flex justify-content-around"
                    @submit.prevent="addUserToProject">
                    <div class="mt-4 d-flex flex-row align-items-center justify-content-center">
                        <div class="visually-hidden">
                                    <span class="text-dark">
                                        Vyber projektasd: {{(project_id = modal_project.id)}}
                                    </span>
                            <input
                                type="text"
                                v-model="project_id"
                                readonly
                            />
                        </div>

                        <div>
                            <select v-model="user_id">
                                <option
                                    v-for="user in users"
                                    :value="user.id">
                                    {{ user.id }} -
                                    {{ user.first_name }}
                                    {{ user.last_name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <button
                        class="btn btn-dark btn-outline-success"
                        type="submit"
                    >
                        přidat uživatela
                    </button>
                </form>

                <!--   DELETE uživatele                 -->
                <div class="modal-footer">
                    <div
                        class="d-flex justify-content-around"
                        v-for="user in modal_project.users"
                    >
                        <h5 class="text-secondary mx-5">
                            {{ user.first_name }} {{ user.last_name }}
                        </h5>

                        <form @submit.prevent="removeUserFromProject">
                            <button
                                class="btn btn-dark btn-outline-danger"
                                type="submit"
                                @click="tableUser(user)"
                            >
                                Odebrat uživatele č. {{ user.id }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD project -->
    <div
        class="modal fade"
        id="createNewProject"
        tabindex="-1"
        aria-labelledby="createNewProject"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="py-4 text-uppercase">
                        Vytvořit nový projekt
                    </h4>

                    <button
                        type="button"
                        id="closeNewProject"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>

                <form
                    class="container col-10"
                    @submit.prevent="createNewProject"
                >
                    <div class="modal-body">
                        <div class="mb-3 col-10 container">
                            <label
                                for="exampleInputEmail1"
                                class="form-label"
                            >
                                název projektu
                            </label>
                            <input
                                v-model="form.name"
                                name="employee"
                                type="text"
                                class="form-control"
                                aria-describedby="emailHelp"
                            />
                        </div>
                        <div class="mb-3 col-10 container">
                            <label
                                for="exampleInputEmail1"
                                class="form-label"
                            >
                                Název společnosti
                            </label>
                            <select v-model="form.company_id">
                                <template v-for="companies in company">
                                    <option>
                                        {{ companies.id }}
                                    </option>
                                </template>

                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            zavřít
                        </button>

                        <button
                            type="submit"
                            class="col-6 btn btn-success"
                        >
                            Přidat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT uživatele -->
    <div
        class="modal fade bd-example-modal-lg"
        id="userData"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div
                    class="modal-header d-flex justify-content-center border-2 border-danger"
                >
                    <h5 class="modal-title border-2 border-danger">
                        {{ user_edit.id }} - {{ user_edit.first_name
                                }}{{ user_edit.last_name }}
                    </h5>

                    <button
                        id="test"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <form @submit.prevent="updateUserData">
                    <div class="modal-content">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                            <tr class="text-center">
                                <th
                                    scope="col"
                                    class="col-1 text-uppercase"
                                >
                                    ID
                                </th>

                                <th
                                    scope="col"
                                    class="col-1 text-uppercase"
                                >
                                    role
                                </th>

                                <th
                                    scope="col"
                                    class="col-2 text-uppercase"
                                >
                                    Jméno
                                </th>

                                <th
                                    scope="col"
                                    class="col-2 text-uppercase"
                                >
                                    Příjmení
                                </th>

                                <th
                                    scope="col"
                                    class="col-4 text-uppercase"
                                >
                                    Email
                                </th>

                                <th
                                    scope="col"
                                    class="col-1 text-uppercase"
                                >
                                    Přezdívka
                                </th>

                                <th
                                    scope="col"
                                    class="col-1 text-uppercase"
                                >
                                    telefonní číslo
                                </th>

                                <th
                                    scope="col"
                                    class="col-1 text-uppercase"
                                >
                                    kč/h
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr class="p-1 bg-white text-center">
                                <td class="fw-bolder">
                                    {{ user_edit.id }}
                                </td>

                                <td>
                                    <select>
                                        <option>admin</option>
                                        <option>uživatel</option>
                                    </select>
                                </td>

                                <td>
                                    <input
                                        class="col-10"
                                        v-model="
                                                        user_edit.first_name
                                                    "
                                    />
                                </td>

                                <td>
                                    <input
                                        class="col-10"
                                        v-model="
                                                        user_edit.last_name
                                                    "
                                    />
                                </td>

                                <td>
                                    <input
                                        class="col-12"
                                        v-model="user_edit.email"
                                        disabled
                                    />
                                </td>

                                <td>
                                    <input
                                        class="col-12"
                                        v-model="user_edit.username"
                                    />
                                </td>

                                <td>
                                    <input
                                        class="col-12"
                                        v-model="user_edit.mobile"
                                    />
                                </td>

                                <td class="text-success">
                                    <input
                                        class="col-12"
                                        v-model="
                                                        user_edit.money_per_hour
                                                    "
                                    />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer mt-5">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
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
