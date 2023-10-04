<template>
  <h2>Question Two - {{ quizDataList.title }}</h2>
  <div class="post">
    <p>Fill in the blank:</p>
    {{ quizDataList.body }}
  </div><!-- END .post -->
</template>

<script>
import axios from 'axios'
export default {
        name: 'QuestionTwo',
        data() {
            return {
                dataReady: false,
                quizDataList: []
            };
        },
        async mounted() {
            try {
                var result = await axios({
                    method: "POST",
                    url: "http://0.0.0.0/graphql",
                    data: {
                        query: `query {
              getQuestion(id:2) {
                title
                body
              }
            }`
                    }
                });
                this.dataReady = true;
                this.quizDataList = result.data.data.getQuestion;
            } catch (error) {
                //console.error(error);
            }
        }
    }
</script>

<style scoped>
</style>
