<template>
    <div class="container">
        <h3>{{ question.question }}</h3>
        <div v-for="choice in choices">
            <input type="radio" :name="'choice'+choice.id" v-bind:value="choice.choice" v-on:click="selectAnswer(choice.choice ,choice.id,1)" v-bind:checked="choice.checked">
            <label v-bind:for="choice.id">{{ choice.choice }}</label>
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
                question: '',
                choices: []
            }
        },

    mounted() {
        this.getQuestion();
        this.getChoices();
        this.selectAnswer(choice, choiceId, questionId);
    },

    methods: {
        getQuestion: function (){
            axios.get('api/question')
            .then((response) => {
                this.question = response.data;
            })
            .catch( function (error){
                console.log(error);
            })
        },

        getChoices: function (){
            axios.get('api/choices')
                .then((response) => {
                    this.choices = response.data.map((item) => {
                        return {
                            id : item.id,
                            choice: item.choice
                        }
                    });
                })
                .catch( function (error){
                    console.log(error);
                })
        },

        selectAnswer: function (choice, choiceId, questionId){
            const postData = {
                choice_id: choiceId,
                question_id: questionId,
                choice: choice
            }
            axios.post('api/store_answer', postData)
            .then(function (response){
                window.location = response.data.redirect;
            })
            .catch(function (error){
                console.log(error)
            });
        }
    }
    }
</script>
