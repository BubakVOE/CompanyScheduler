<template>
    <!-- <div>
        <a :href="'/dashboard/'+ this.user_id + '/info/year=' + this.year + '/month=' + this.month + '.pdf'" class="btn btn-primary mb-2 d-flex flex-column">
            <span>
                PDF
            </span>
        </a>
    </div> -->

    {{ laravelData }}

    <button @click="getModels">
        click
    </button>

    <pagination :data="laravelData" @pagination-change-page="getModels"></pagination>

</template>

<script>



export default {
    name: "TestIndex",

    props: [],

    components: {
    },


    data() {
        return {

            year: 2022,
            month: 10,
            user_id: 1,

            poggers: {},

            laravelData: {},
        };
    },

    mounted(){
        this.getModels()
    },

    methods: {

        getModels(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
    
            // axios
            //     .post('/axios/dashboard/test?page' + page)
            //     .then(response => {
            //         return response.json();
            //     }).then(data => {
            //         this.laravelData = data;
            // });

            axios
                .post('/axios/dashboard/test?page' + page)
                .then((response)=> {
                    this.laravelData=response.data
                    console.log(response.data)
                })
            //     .then(response => {
            //         console.log(response)
            //     }).then(data => {
            //         console.log(data)
            // });

        },


        test() {
            let url = '/axios/post'

            axios
                .post(url)
                .then((response) => {

                    this.poggers = response.data
                    console.log(response.data)
                })

        }

    }

}
</script>

<style>

</style>
