<template>
    <div class="container">
        <h1>{{ question.question }}</h1>
        <div v-for="choice in choices">
            <input type="radio" :name="'choice'+choice.id" v-bind:value="choice.choice" v-on:click="selectAnswer(choice.choice ,choice.id,1)" v-bind:checked="choice.checked">
            <label v-bind:for="choice.id">{{ choice.choice }}</label>
        </div>

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
                    console.log(this.choices);
                })
                .catch( function (error){
                    console.log(error);
                })
        },

        selectAnswer: function (choice, choiceId, questionId){
            console.log(choiceId, questionId)
            const postData = {
                choice_id: choiceId,
                question_id: questionId,
                choice: choice
            }
            console.log("postDta: " + postData);
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
