<template>
  <h1 class="text-3xl font-bold underline">Quiz app</h1>

<div id="app">
  <button @click="component ='QuestionsList'">QuestionsList</button>
  <button @click="component ='QuestionOne'">Question One</button>

  <p>*************************************</p>
  <component :is="component" />
  </div>

</template>

<script>
import QuestionsList from '../../resources/components/QuestionsList.vue';
import QuestionOne from './QuestionOne.vue';

  export default {
    name: 'app',
    components: {
      QuestionsList, QuestionOne
    },
  data() {
    return {
      component: null,
    };
  },
}
</script>
