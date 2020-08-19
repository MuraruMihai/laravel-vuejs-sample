<template>
    <div class="container">
        <h1>Question?</h1>
        <h2>{{ question.question }}</h2>
    </div>
</template>
<script>
    export default {
        data: function (){
            return {
                question: '',
                choices: []
            }
        },

    mounted() {
        this.question();
        this.choices();
        this.storeAnswers();
    },

    methods: {
        question: function (){
            axios.get('api/question')
            .then((response) => {
                console.log("test" + response.data);
                this.question = response.data;
            })
            .catch( function (error){
                console.log(error);
            })
        },

        choices: function (){
            axios.get('api/choices')
                .then((response) => {
                    console.log("test" + response.data);
                    this.choices = response.data;
                })
                .catch( function (error){
                    console.log(error);
                })
        },

        storeAnswers: function (){

        }
    }
    }
</script>
