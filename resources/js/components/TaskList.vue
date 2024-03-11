<!-- resources/js/components/TaskList.vue -->
<template>
    <div>
      <h1>Task List</h1>
      <ul>
        <li v-for="task in tasks" :key="task.id">{{ task.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    props: ['tasks']
  }
  </script>