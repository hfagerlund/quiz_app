<template>
  <h1>Quiz app</h1>
  <div id="app">
    <component :is="component" />
  </div>
</template>

<script>
import QuestionsList from './QuestionsList.vue';
import Testing from './Test.vue';

export default {
  name: 'app',
  components: {
    QuestionsList, Testing
  },
  data() {
    return {
      component: 'QuestionsList',
    };
  },
}
</script>
