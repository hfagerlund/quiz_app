import axios from 'axios';
import { mount } from '@vue/test-utils'
import { rest, graphql } from 'msw';
import { setupServer } from 'msw/node';
import { beforeAll, afterAll, afterEach, describe, expect, it, test, vi } from 'vitest'

import QuestionsList from '../../resources/components/QuestionsList.vue'

//vi.mock('axios')

const URL = 'http://0.0.0.0/graphql';
const MOCKED_RESPONSE = {title: 'Mocked response', message: 'override of component data',};

const client = axios.create();
const server = setupServer(rest.post(URL, (req, res, ctx) => res(ctx.json(MOCKED_RESPONSE))));

beforeAll(() => server.listen());

server.listen({
  //onUnhandledRequest: 'bypass',
  onUnhandledRequest(req) {
    console.error(
      'Found an unhandled %s request to %s',
      req.method,
      req.url.href,
    )
  },
})

afterEach(() => server.resetHandlers());
afterAll(() => server.close());


test('findComponent', async () => {
  try {
  const wrapper = await mount(QuestionsList)

  wrapper.findComponent('#test1')
  wrapper.findComponent({ name: 'QuestionsList' })
  wrapper.findComponent({ class: 'post' })
  wrapper.findComponent(QuestionsList)
  } catch (error) {
    console.error(error);
  }
})

test('mounts a component', async () => {
  try {
    const wrapper = await mount(QuestionsList, {})
    expect(wrapper.html()).toContain('Question:')
    expect(wrapper.html()).toContain('Hints')
    expect(wrapper.find('h3').text()).to.equal('Hints');
  } catch (error) {
    console.error(error);
  }
})



/*
describe('API response', () => {
    it('should get mocked response', async () => {
      try {
        const res = await axios.get(URL)
        //console.log(res);
        expect(res.data.message).toBe('override of component data')
      } catch (error) {
        console.error(error);
      }
    });
  });
//*/

/*
it('test questions query', async() => {
  const wrapper = mount(QuestionsList)
  await wrapper.vm.$nextTick();
  expect(wrapper.find('[class="post"]').exists()).toBe(true);
  //await flushPromises();
  expect(wrapper.find('[class="just-the-hints"]').exists()).toBe(false);
})
//*/
