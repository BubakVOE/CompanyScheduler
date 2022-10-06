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
                <span class="fs-4 ms-2">Záznamy přihlášení</span>
            </div>
        </header>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">

                <h1 class="display-5 fw-bold">Vyber uživatele</h1>

                <select class="btn btn-sm btn-outline-secondary dropdown-toggle m-5" v-model="user_id"
                    @change="authenticationLog()">

                    <option value="all">
                        Všichni
                    </option>

                    <template v-for="user in users">
                        <option :value="user.id">
                            {{ user . first_name }} {{ user . last_name }}
                        </option>
                    </template>
                </select>

            </div>
        </div>

        <div class="row align-items-md-stretch">

            <div class="table-responsive">
                <table class="table table-striped table-hover">

                    <template v-if="multiple_users">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col" class="col-1 text-uppercase">
                                    ID
                                </th>

                                <th scope="col" class="col-1 text-uppercase">
                                    Uživatel
                                </th>

                                <th scope="col" class="col-1 text-uppercase">
                                    ip_address
                                </th>

                                <th scope="col" class="col-2 text-uppercase">
                                    browser
                                </th>

                                <th class="col-1 text-uppercase">
                                    přihlášení
                                </th>


                                <th class="col-1 text-uppercase">
                                    odhlášení
                                </th>

                            </tr>
                        </thead>

                        <tbody class="w-100" v-for="multiple_user in multiple_users">
                            <tr v-for="data in multiple_user">
                                <td class="text-center">
                                    {{ data . id }}
                                </td>

                                <td class="text-center">
                                    <a :href="'/employee/'+data.authenticatable_id+'/show'">
                                        {{ data . authenticatable_id }}
                                    </a>
                                </td>

                                <td class="text-center">
                                    {{ data . ip_address }}
                                </td>

                                <td class="text-center">
                                    {{ data . user_agent }}
                                </td>

                                <td class="text-center">
                                    {{ data . login_at }}
                                </td>

                                <td class="text-center">
                                    {{ data . logout_at }}
                                </td>
                            </tr>

                        </tbody>

                    </template>

                    <template v-if="single_user">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col" class="col-1 text-uppercase">
                                    ID
                                </th>

                                <th scope="col" class="col-1 text-uppercase">
                                    ip_address
                                </th>

                                <th scope="col" class="col-2 text-uppercase">
                                    browser
                                </th>

                                <th class="col-1 text-uppercase">
                                    přihlášení
                                </th>


                                <th class="col-1 text-uppercase">
                                    odhlášení
                                </th>

                            </tr>
                        </thead>

                        <tbody class="w-100" >
                            <tr v-for="data in single_user">
                                <td class="text-center">
                                    {{ data . id }}
                                </td>

                                <td class="text-center">
                                    {{ data . ip_address }}
                                </td>

                                <td class="text-center">
                                    {{ data . user_agent }}
                                </td>

                                <td class="text-center">
                                    {{ data . login_at }}
                                </td>

                                <td class="text-center">
                                    {{ data . logout_at }}
                                </td>
                            </tr>

                        </tbody>
                    </template>

                </table>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'users'
        ],

        data() {
            return {
                user_id: 'all',
                multiple_users: {},
                single_user: {},
            }
        },

        mounted() {
            this.authenticationLog()
        },

        methods: {

            authenticationLog() {
                let url = "/axios/dashboard/authentication/" + this.user_id

                axios
                    .post(url)
                    .then((response) => {
                        this.success = response.data.success
                        this.multiple_users = response.data.multiple_users
                        this.single_user = response.data.single_user
                    })
            }


        }
    }
</script>
