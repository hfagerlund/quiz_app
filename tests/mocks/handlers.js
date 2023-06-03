import { graphql } from 'msw'

/*
query QuestionsQuery() {
  questions {
    title
    body
  }
}
*/

export const handlers = [
  // handles a "QuestionsQuery" query
  graphql.query('QuestionsQuery', (req, res, ctx) => {
  
    // respond with a query payload
    return res(
      ctx.data({
        questions: {
          title: 'Non cumque quo illum.',
          body: 'Asperiores dolor necessitatibus et nemo esse. Cum ullam quod aut quisquam tempore voluptas et. Nam esse nobis similique esse ut. Molestias illo sunt eum placeat eum. Aliquam autem iure quos.',
        },
      }),
    )
  }),
]
