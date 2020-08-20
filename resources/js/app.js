require('./bootstrap');

window.Vue = require('vue');

Vue.component('question-page', require('./components/QuestionPage.vue').default);
Vue.component('answer-page', require('./components/AnswerPage.vue').default);

const app = new Vue({
    el: '#app',
})
