<template>
  <h2>Question One</h2>
  <div class="container">
  <div class="start-box">
    <div
      id="draggable-1"
      class="reorder"
      draggable="true"
      v-on:dragstart="onDragStart($event)"
    >
      <!-- draggable -->
      Drag item #1 to place it in the correct sequence.
    </div>
  </div>

  <div class="start-box">
    <div
      id="draggable-1"
      class="reorder"
      draggable="true"
      v-on:dragstart="onDragStart($event)"
    >
      <!-- draggable -->
      Drag item #2 to place it in the correct sequence.
    </div>
  </div>

  <div
    class="dropzone"
    v-on:dragover="onDragOver($event)"
    v-on:drop="onDrop($event)"
  >
    drop zone 1
  </div>

  <div
    class="dropzone"
    v-on:dragover="onDragOver($event)"
    v-on:drop="onDrop($event)"
  >
    drop zone 2
  </div>

  <div
    class="dropzone"
    v-on:dragover="onDragOver($event)"
    v-on:drop="onDrop($event)"
  >
    drop zone 3
  </div>
</div>
</template>

<script>
export default {
  name: 'QuestionOne',
  props: {
    msg: String
  },
  methods: {
    onDragStart(event) {
    event.dataTransfer.clearData();
    event
    .dataTransfer
    .setData('text/plain', event.target.id);

    event
    .currentTarget
    .style
    .backgroundColor = 'yellow';
    },
    onDragOver(event) {
      event.preventDefault();
    },
    onDrop(event) {
      event.preventDefault();
      const id = event
    .dataTransfer
    .getData('text');

    const draggableElement = document.getElementById(id);

    const dropzone = event.target;

    dropzone.appendChild(draggableElement);

    }
  }
}
</script>

<style scoped>
.container {
  background-color:transparent;
  color: #000;
  display: flex;
}

.start-box {
  border: 2px solid #999;
  flex-basis: 100%;
  flex-grow: 1;
  padding: 0.2em;
}

.reorder {
  background-color: #ff0;
  font-weight: normal;
  margin-bottom: 10px;
  margin-top: 10px;
  padding: 10px;
}

.dropzone {
  background-color: #cff;
  border: 2px solid #000;
  flex-basis: 100%;
  flex-grow: 1;
  margin: 0 0 0 0.2em;
  padding: 0.2em;
}
</style>
