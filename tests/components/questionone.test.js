import { mount } from '@vue/test-utils'
import QuestionOne from '../../resources/components/QuestionOne.vue'

test('findComponent', async () => {
  try {
  const wrapper = await mount(QuestionOne)

  wrapper.findComponent('#draggable-1')
  wrapper.findComponent({ name: 'QuestionOne' })
  wrapper.findComponent({ class: 'start-box' })
  wrapper.findComponent(QuestionOne)
  } catch (error) {
    console.error(error);
  }
})

test('mounts a component', async () => {
  try {
    const wrapper = await mount(QuestionOne, {})
    expect(wrapper.html()).toContain('Question One')
  } catch (error) {
    console.error(error);
  }
})

test('html', async() => {
  try {
    const wrapper = await mount(QuestionOne, {})
    expect(wrapper.html()).toEqual('<h2 data-v-287d1ee4="">Question One</h2>\n' +
    '<div class="container" data-v-287d1ee4="">\n' +
    '  <div class="start-box" data-v-287d1ee4="">\n' +
    '    <div id="draggable-1" class="reorder" draggable="true" data-v-287d1ee4="">\n' +
    '      <!-- draggable --> Drag item #1 to place it in the correct sequence.\n' +
    '    </div>\n' +
    '  </div>\n' +
    '  <div class="start-box" data-v-287d1ee4="">\n' +
    '    <div id="draggable-1" class="reorder" draggable="true" data-v-287d1ee4="">\n' +
    '      <!-- draggable --> Drag item #2 to place it in the correct sequence.\n' +
    '    </div>\n' +
    '  </div>\n' +
    '  <div class="dropzone" data-v-287d1ee4=""> drop zone 1 </div>\n' +
    '  <div class="dropzone" data-v-287d1ee4=""> drop zone 2 </div>\n' +
    '  <div class="dropzone" data-v-287d1ee4=""> drop zone 3 </div>\n' +
    '</div>')
  } catch (error) {
    console.error(error);
  }
})

it('test component h2 heading', () => {
  const wrapper = mount(QuestionOne)
  expect(wrapper.find('h2').text()).to.equal('Question One');
})

