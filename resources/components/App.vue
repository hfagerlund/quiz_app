<template>
  <h1 class="text-3xl font-bold underline">Quiz app</h1>

<div id="app">
  <a href="#" @click="component ='QuestionsList'" class="flex sm:inline-flex justify-center items-center bg-green-500 hover:bg-green-600 active:bg-green-700 focus-visible:ring ring-green-300 text-white font-semibold text-center rounded-md outline-none transition duration-100 px-5 py-2">
      QuestionsList
    </a>

  <button @click="component ='QuestionOne'" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Question One</button>

  <button @click="component ='QuestionTwo'" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Question Two</button>

  <button @click="component ='QuestionThree'" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Question Three</button>
  <p>*************************************</p>
  <component :is="component" />
  </div>

</template>

<script>
import QuestionsList from './QuestionsList.vue';
import QuestionOne from './QuestionOne.vue';
import QuestionTwo from './QuestionTwo.vue';
import QuestionThree from './QuestionThree.vue';

  export default {
    name: 'app',
    components: {
      QuestionsList, QuestionOne, QuestionTwo, QuestionThree
    },
  data() {
    return {
      component: null,
    };
  },
}
</script>
