<template>
  <h1>Quiz app</h1>

<div id="app">
  <button @click="component ='QuestionsList'">QuestionsList</button>
  <button @click="component ='Testing'">Test component</button>

  <p>*************************************</p>
  <component :is="component" />
  </div>

</template>

<script>
import QuestionsList from '../../tests/components/QuestionsList.vue';
import Testing from './Test.vue';

  export default {
    name: 'app',
    components: {
      QuestionsList, Testing
    },
  data() {
    return {
      component: null,
    };
  },
}
</script>
