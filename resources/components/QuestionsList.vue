<template>
    <div class="post" v-for="questionData in quizDataList" v-bind:key="questionData.id">
            <h3>Question: {{ questionData.title }}</h3>
            <p class="py-2.5">{{ questionData.body }}</p>

            <h3>Hints</h3>
        <ul>
            <li class="just-the-hints m-5" v-for="thehint in questionData.hints" :key="thehint.id">
              {{ thehint.hint }}
            </li>
        </ul>
        <hr
    class="border-t-[1px] border-dotted border-teal-600 h-1 text-center overflow-visible
    after:content-['***'] after:relative after:top-[-10px] after:bg-white after:text-teal-600 after:px-1"
/>
    </div><!-- END .post -->
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
                //console.error(error);
            }
        }
    }
</script>
