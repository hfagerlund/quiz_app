import { graphql } from 'msw'

export const handlers = [
  // handles a "QuestionsQuery" query
  graphql.query('QuestionsQuery', null),
]
