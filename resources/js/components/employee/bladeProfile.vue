<template>
    <div>


        <div>

            <!-- PŘEHLED -->
            <div class="text-center mt-5 mb-5">
                <div class="d-flex justify-content-center">
                    <h1 class="text-dark text-uppercase fw-bolder col-2 py-2 rounded-3 rounded">
                        Přehled
                    </h1>
                </div>

                <div class="container rounded bg-white py-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-dark">
                                <div class="card-body text-center">
                                    <h1 class="text-center text-white text-uppercase">
                                        Včerejší den
                                    </h1>

                                    <p class="text-white text-opacity-25">
                                        (aktuálně je
                                        {{ this_yesterday_number + 1 }}.{{ last_month_number + 1 }}. {{ year }})
                                    </p>

                                    <h2 class="card-text text-white ">
                                        {{ this_yesterday_number }}.
                                        {{ last_month_number + 1 }}. {{ year }}
                                    </h2>

                                    <p class="card-text bg-light py-2 fw-bolder text-success">
                                        {{ this_yesterday_earns }},-
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-dark">
                                <div class="card-body text-center">
                                    <h1 class="text-center text-white text-uppercase">
                                        Minulý týden
                                    </h1>

                                    <p class="text-white text-opacity-25">
                                        (aktuálně je {{ last_week_number + 1 }}.týden)
                                    </p>

                                    <h2 class="card-text text-white">
                                        {{ last_week_number }}. týden v kalendářním roce
                                    </h2>

                                    <p class="card-text bg-light py-2 fw-bolder text-success">
                                        {{ last_week_earns }},-
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-dark">
                                <div class="card-body text-center">
                                    <h1 class="text-center text-white text-uppercase">
                                        Minulý měsíc
                                    </h1>

                                    <p class="text-white text-opacity-25">
                                        (aktuálně je {{ last_month_number + 1 }}.měsíc)
                                    </p>

                                    <h2 class="card-text text-white">
                                        {{ last_month_number }}. měsíc v kalendářním roce
                                    </h2>

                                    <p class="card-text bg-light py-2 fw-bolder text-success">
                                        {{ last_month_earns }},-
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>


        <div>
            <div class="d-flex align-items-center justify-content-between align-items-center">
                <h1 class="text-uppercase text-left fw-bolder">
                    Výplaty
                    <span class="fw-lighter text-lowercase">(2021)</span>
                </h1>

                <select class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <option>
                        2021
                    </option>
                    <option>
                        2022
                    </option>
                    <option>
                        2023
                    </option>
                </select>
            </div>

            <profile-bar-graph>
            </profile-bar-graph>
        </div>

    </div>
</template>

<script>
export default {

    props: [
        "user",

        "logged_user",

        "active",

        "in_year",

        "in_month",

        "project_data",

        "this_yesterday_earns",
        "this_yesterday_number",

        "last_week_earns",
        "last_week_number",

        "last_month_earns",
        "last_month_number",
    ],

    // setup () {


    //     return {}
    // }
}
</script>
