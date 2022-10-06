<template>
    <div class="m-2 card mb-3 bg-opacity-10" :style="'background-color:'+ employee.user_color">
        <div class="row g-0">
            <div class="col-md-3 d-flex  justify-content-center align-items-center ">
                <img :src="employee.icon">
            </div>
            <div class="col-md-9">
                <div class="card-body">

                    <h5 class="card-title fw-bolder">
                        {{ employee.first_name }} {{ employee.last_name }}
                    </h5>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="col">

                                <h5 class="card-subtitle py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>

                                    {{ employee.email }}
                                </h5>

                                <h5 class="card-subtitle py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>

                                    {{ employee.username }}
                                </h5>

                                <h5 class="card-subtitle py-2">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                    </span>
                                    <template v-if="employee.mobile == 0">
                                        Neuvedeno
                                    </template>

                                    <template v-else>
                                        {{ employee.mobile }}
                                    </template>
                                </h5>
                            </div>

                            <div class="col-10">

                                <a
                                    class="btn btn-dark col-10 text-center text-uppercase m-1"
                                    :href="'/employee/' + employee.id + '/show'"
                                >
                                    Zobrazit více
                                </a>
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
    name: "EmployeeCard",
    props: ['employee'],
}
</script>

<style scoped>

</style>
