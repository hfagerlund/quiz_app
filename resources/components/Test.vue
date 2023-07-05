<template>
  <div class="container">
  <div class="start-box">
    <div
      id="draggable-1"
      class="reorder"
      draggable="true"
      v-on:dragstart="onDragStart($event)"
    >
      <!-- draggable -->
      Drag this item to the correct drop zone.
    </div>
  </div>

  <div
    class="dropzone"
    v-on:dragover="onDragOver($event)"
    v-on:drop="onDrop($event)"
  >
    drop zone
  </div>
</div>
</template>

<script>
export default {
  name: 'Testing',
  props: {
    msg: String
  },
  methods: {
    onDragStart(event) {

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

    event.dataTransfer.clearData();
    }
  }
}
</script>

<style scoped>
.container {
  border: 2px solid #000;
  background-color:transparent;
  color: #000;
  display: flex;
}

.start-box {
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
  flex-basis: 100%;
  flex-grow: 1;
  padding: 0.2em;
}
</style>
