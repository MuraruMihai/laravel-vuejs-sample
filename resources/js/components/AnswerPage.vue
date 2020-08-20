<template>
    <div class="container">
        <h1>Answers</h1>
        <div v-for="answer in response">
            <label>{{ answer.choice }} {{ answer.percentage }}% - {{ answer.number }} results </label>
        </div>

    </div>
</template>
<script>
export default {
    data: function (){
        return {
            response: []
        }
    },

    mounted() {
        this.getAnswers();
    },

    methods: {
        getAnswers: function (){
            axios.get('api/answers')
                .then((response) => {
                    console.log("response: " + response)
                    this.response = response.data;
                })
                .catch( function (error){
                    console.log(error);
                })
        },
    }
}
</script>
