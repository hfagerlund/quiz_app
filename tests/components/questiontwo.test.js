import { mount } from '@vue/test-utils'
import QuestionTwo from '../../resources/components/QuestionTwo.vue'

test('findComponent', async () => {
  try {
  const wrapper = await mount(QuestionTwo)

  wrapper.findComponent({ name: 'QuestionTwo' })
  wrapper.findComponent({ class: 'post' })
  wrapper.findComponent(QuestionTwo)
  } catch (error) {
    console.error(error);
  }
})

test('mounts a component', async () => {
  try {
    const wrapper = await mount(QuestionTwo, {})
    expect(wrapper.html()).toContain('Question Two')
    expect(wrapper.html()).toContain('Fill in the blank:')
  } catch (error) {
    console.error(error);
  }
})

test('html', async() => {
  try {
    const wrapper = await mount(QuestionTwo, {})
    expect(wrapper.html()).toContain('<h2>Question Two - </h2>\n' +
    '<div class="post">\n' +
    '  <p>Fill in the blank:</p>\n' +
    '</div>\n' +
    '<!-- END .post -->')
  } catch (error) {
    console.error(error);
  }
})

it('test component h2 heading', () => {
  const wrapper = mount(QuestionTwo)
  expect(wrapper.find('h2').text()).to.contain('Question Two');
})

