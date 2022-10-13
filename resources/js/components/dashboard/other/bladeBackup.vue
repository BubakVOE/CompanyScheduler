<template>
    <div class="container py-4 shadow-lg rounded-3">

        <header class="pb-3 mb-4 border-bottom d-flex justify-content-between ">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-cloud-download" viewBox="0 0 16 16">
                    <path
                        d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                    <path
                        d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                </svg>
                <span class="fs-4 ms-2">Back up manažér</span>
            </div>
            <button @click="backupDB()" class="btn btn-primary"> Download Database</button>
        </header>

        <div class="my-3 p-3 card">

            <template v-for="file in backups">

                <div class="d-flex text-muted pt-3">

                    <span>
                        <template v-if="file.fileext == 'sql'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-filetype-sql" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM0 14.841a1.129 1.129 0 0 0 .401.823c.13.108.288.192.478.252s.411.091.665.091c.338 0 .624-.053.858-.158.237-.106.416-.252.54-.44a1.17 1.17 0 0 0 .187-.656c0-.224-.045-.41-.135-.56a1 1 0 0 0-.375-.357 2.027 2.027 0 0 0-.565-.21l-.621-.144a.97.97 0 0 1-.405-.176.369.369 0 0 1-.143-.299c0-.156.061-.284.184-.384.125-.101.296-.152.513-.152.143 0 .266.022.37.068a.624.624 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.199-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.552.05-.776.15-.225.099-.4.24-.528.421-.127.182-.19.395-.19.639 0 .201.04.376.123.524.082.149.199.27.351.367.153.095.332.167.54.213l.618.144c.207.049.36.113.462.193a.387.387 0 0 1 .153.325c0 .11-.029.207-.085.29A.558.558 0 0 1 2 15.31c-.111.047-.249.07-.413.07-.117 0-.224-.013-.32-.04a.835.835 0 0 1-.248-.115.579.579 0 0 1-.255-.384H0Zm6.878 1.489-.507-.739c.176-.162.31-.362.401-.6.092-.239.138-.507.138-.806v-.501c0-.371-.07-.693-.208-.967a1.495 1.495 0 0 0-.589-.636c-.256-.15-.561-.225-.917-.225-.351 0-.656.075-.914.225-.256.149-.453.36-.592.636a2.138 2.138 0 0 0-.205.967v.5c0 .37.069.691.205.965.139.273.336.485.592.636a1.8 1.8 0 0 0 .914.222 1.8 1.8 0 0 0 .6-.1l.294.422h.788ZM4.262 14.2v-.522c0-.246.038-.456.114-.63a.91.91 0 0 1 .325-.398.885.885 0 0 1 .495-.138c.192 0 .357.046.495.138a.88.88 0 0 1 .325.398c.077.174.115.384.115.63v.522c0 .164-.018.312-.053.445-.035.13-.087.244-.155.34l-.106-.14-.105-.147h-.733l.451.65a.638.638 0 0 1-.251.047.872.872 0 0 1-.487-.147.916.916 0 0 1-.32-.404 1.67 1.67 0 0 1-.11-.644Zm3.986 1.057h1.696v.674H7.457v-3.999h.79v3.325Z" />
                            </svg>
                        </template>

                        <template v-else>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-question-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
                            </svg>
                        </template>
                    </span>

                    <div class="pb-3 mb-0 ms-2 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">
                                {{ file . filename }}
                            </strong>
                            <span>
                                {{ file . fileext }}
                            </span>
                        </div>
                        <div class="d-block">

                            <div>
                                {{ file . filesize }} KiB
                            </div>

                            <div class="d-flex">
                                <a class="text-primary btn" :href="'/storage/db_backup/' + file.filename">
                                    download
                                </a>

                                <button class="text-danger btn" @click="removeDB(file)">
                                    smazat
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </template>

        </div>

    </div>
</template>

<script>
export default {

    props: [],

    data() {
        return {
            backups: {},
        }
    },

    mounted() {
        this.getDatabase();

    },

    methods: {

        getDatabase() {
            let url = "/axios/dashboard/backup"

            axios
                .post(url)
                .then((response) => {
                    this.backups = response.data
                })
        },

        backupDB() {
            let url = "/dashboard/backup/store"

            axios
                .post(url)
                .then((response) => {

                    this.getDatabase();

                    console.log(response.data.success)

                    if (response.data.success == true) {
                        Swal.fire({
                            position: 'bottom-end',
                            icon: "success",
                            title: "Databáze byla zálohována",
                            showConfirmButton: false,
                            timer: 800,
                        });

                    } else if(response.data.success == 'exist'){
                        Swal.fire({
                            position: 'center',
                            icon: "warning",
                            title: "Databáze již byla provedena",
                            showConfirmButton: true,
                        });
                    } 
                    else {
                        Swal.fire({
                            position: 'center',
                            icon: "error",
                            title: "Vyskystla se neočekávaná chyba",
                            showConfirmButton: true,
                        });
                    }
                })
        },

        removeDB(file) {

            let url = "/dashboard/backup/" + file.filename + "/delete"

            axios
                .post(url)
                .then((response) => {
                    if (response.data.success == true) {
                        Swal.fire(
                            'Success!',
                            'Databáze byla smazána.',
                            'success',

                            axios
                                .post(url)
                                .then((response) => {
                                    this.getDatabase();

                                })
                        )
                    }

                })




            // Swal.fire({
            //     title: 'Chceš smazat databázi?',
            //     text: "Akce je nevratná!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#FF001A',
            //     cancelButtonColor: '#9FA2B2',
            //     confirmButtonText: 'Smazat!'
            // }).then((result) => {
            //     if (result.isConfirmed) {

            //     }
            // })


        }

    }



}
</script>
