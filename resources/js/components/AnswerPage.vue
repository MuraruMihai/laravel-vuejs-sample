<template>
    <div class="container">
        <h3>Answers</h3>
        <div v-for="answer in response">
            <label>{{ answer.choice }} {{ answer.percentage }}% - {{ answer.number }} results </label>
        </div>

    </div>
</template>
<style lang="css" scoped>
    .container{
        margin-top: 75px;
        border: 1px solid #abb3c6;
        padding: 30px;
    }
    h3{
        text-decoration: underline;
        text-decoration-color: #6db8b8;
        font-family: roboto;
    }
</style>
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
