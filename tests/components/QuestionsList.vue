<template>
  <h2 class="quizheading">Questions</h2>
    <div class="post" v-for="questionData in quizDataList" v-bind:key="questionData.id">
            <h3>Question: {{ questionData.title }}</h3>
            <p>{{ questionData.body }}</p>

            <h3>Hints</h3>
        <ul>
            <li class="just-the-hints" v-for="thehint in questionData.hints" :key="thehint.id">
              {{ thehint.hint }}
            </li>
        </ul>
        <hr>
    </div>
</template>

<script>
import axios from 'axios'
export default {
        name: 'QuestionsList',
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
                        query: `{
                               questions {
                                    id
                                    title
                                    body
                                    attempts
                                    points
                                    hints {
                                      hint
                                      points_decreased_by
                                    }
                                }
                        }`
                    }
                });
                this.dataReady = true;
                this.quizDataList = result.data.data.questions;
            } catch (error) {
                console.error(error);
            }
        }
    }
</script>
