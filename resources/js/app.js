require('./bootstrap');
import QuestionPage from 'vue-template-compiler';
// require vue
window.Vue = require('vue');
// id app
Vue.component('question-page', require('./components/QuestionPage.vue').default);
//  front-end component
const app = new Vue({
    el: '#app',
})
