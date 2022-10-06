<template>
    <div class="container py-4 shadow-lg rounded-3">
        
        <header class="pb-3 mb-4 border-bottom">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                </svg>

                <span class="fs-4 ms-2">PDF editor</span>
            </div>
        </header>

        <div class="row g-4 py-5 row-cols-2">

            <!-- COMPANY -->
            <div class="p-1">
                <div class="card p-5 ">
                    <div class="col d-flex align-items-start ">
                        <div
                            class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#cpu-fill"></use>
                            </svg>
                        </div>
                        <div class="d-grid">
                            <h2 class="border-bottom">
                                Společnost
                            </h2>

                            <p>
                                Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another
                                sentence and probably just keep going until we run out of words.
                            </p>

                            <div class="text-center d-grid ">
                                <span class="pt-1 form-checked-content">
                                    <strong>vyber společnost</strong>
                                </span>

                                <div>
                                    <select v-model="company.company_id" @change="companyGetDate" class="w-25">
                                        <template v-for="company in companies">
                                            <option :value="company.id">
                                                {{ company . name }}
                                            </option>
                                        </template>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-5">

                                <div>
                                    <template v-if="company_date == ''">
                                        <h1 class="text-center d-grid mt-2">
                                            prázdno
                                        </h1>
                                    </template>

                                    <template v-else>
                                        <template v-for="(months, i_year) in company_date" :key="months">
                                            <div class="text-center d-grid mt-2">
                                                <h1>
                                                    {{ i_year }}
                                                </h1>

                                                <template v-for="i_month in months" :key="i_month">
                                                    <div>
                                                        <button class="col-8 btn btn-primary m-1"
                                                            @click="companyData(i_year, i_month)"
                                                            :href="'?year=' + i_year + '&month=' + i_month">
                                                            {{ i_month }}. měsíc
                                                        </button>
                                                    </div>
                                                </template>

                                            </div>
                                        </template>
                                    </template>
                                </div>

                                <div>
                                    <template v-if="company.year && company.month">
                                        <a :href="'/dashboard/company/' + this.company.company_id + '/' + this.company.year +
                                            '/' + this.company.month + ''"
                                            class="btn btn-success mt-5 mb-2 d-flex flex-column">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                                </svg>
                                            </span>

                                            Generovat
                                        </a>
                                    </template>

                                    <template v-else>
                                        vyber datum pro stažení PDFka
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ZAMĚSTNANCI -->
            <div class="p-1">
                <div class="card p-5 ">
                    <div class="col d-flex align-items-start ">
                        <div
                            class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#cpu-fill"></use>
                            </svg>
                        </div>
                        <div class="d-grid">
                            <h2 class="border-bottom">
                                Zaměstnance
                            </h2>

                            <p>
                                Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another
                                sentence and probably just keep going until we run out of words.
                            </p>

                            <div class="text-center d-grid ">
                                <span class="pt-1 form-checked-content">
                                    <strong>vyber uživatele</strong>
                                </span>

                                <div>

                                    <select v-model="employee.user_id" @change="employeeGetDate" class="w-25">
                                        <template v-for="user in users">
                                            <option :value="user.id">
                                                {{ user . first_name }} {{ user . last_name }}
                                            </option>
                                        </template>
                                    </select>

                                </div>
                            </div>

                            <div class="mt-5">

                                <template v-if="employee_date == ''">
                                    <h1 class="text-center d-grid mt-2">
                                        prázdno
                                    </h1>
                                </template>

                                <template v-else>
                                    <template v-for="(months, i_year) in employee_date" :key="months">
                                        <div class="text-center d-grid mt-2">
                                            <h1>
                                                {{ i_year }}
                                            </h1>

                                            <template v-for="i_month in months" :key="i_month">
                                                <div>
                                                    <button class="col-8 btn btn-primary m-1"
                                                        @click="employeeData(i_year, i_month)"
                                                        :href="'?year=' + i_year + '&month=' + i_month">
                                                        {{ i_month }}. měsíc
                                                    </button>
                                                </div>
                                            </template>

                                        </div>
                                    </template>
                                </template>

                                <template v-if="employee.year && employee.month">
                                    <a :href="'/dashboard/employee/' + this.employee.user_id + '/' + this.employee.year + '/' +
                                        this.employee.month + ''"
                                        class="btn btn-success mt-5 mb-2 d-flex flex-column">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                            </svg>
                                        </span>

                                        Generovat
                                    </a>
                                </template>

                                <template v-else>
                                    vyber datum pro stažení PDFka
                                </template>

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
            "companies",
            "years",
            "months",
            "users",
        ],
        data() {
            return {

                company_works: "",


                company: {
                    company_id: "23",
                    year: 0,
                    month: 0,
                },

                company_date: [],

                employee: {
                    user_id: "1",
                    year: 0,
                    month: 0,
                },

                employee_date: [],
            }
        },

        mounted() {
            // this.select_company = this.companies[0]?.name;

            this.employeeGetDate();
            this.companyGetDate();

        },

        methods: {
            employeeData(year, month) {
                this.employee.year = year
                this.employee.month = month
            },

            employeeGetDate() {
                let url = "/axios/dashboard/employee/date"

                axios
                    .post(url, this.employee)
                    .then((response) => {
                        console.log('pog', response)
                        this.employee_date = response.data
                    })
            },

            companyData(year, month) {
                this.company.year = year
                this.company.month = month
            },

            companyGetDate() {
                let url = "/axios/dashboard/company/date"

                axios
                    .post(url, this.company)
                    .then((response) => {
                        console.log('pog', response)
                        this.company_date = response.data
                    })
            },

        }

    }
</script>
