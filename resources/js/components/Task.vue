<template>
    <div class="todo">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id" class="table-body">
            <td>{{ task.title }}</td>
            <td>{{ task.description }}</td>
            <td>{{ task.status }}</td>
            <td>{{ task.deadline }}</td>
            <td>
                <button @click="editTask(task)">Edit</button>
                <button @click="deleteTask(task)">Delete</button>
          </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';

  export default {
    name: 'vueTask',
    data() {
        return {
            tasks: []
        };
    },
    created(){
        this.fetchTasks();
    },
    methods: {
        fetchTasks() {
            axios.get('http://localhost:8000/vueTask')
            .then(response => {
                this.tasks = response.data;
                
            })
            .catch(error => {
                console.error('Error fetching tasks:', error);
            });
        },

        editTask(task) {
            // Handle edit operation
            axios.delete(`http://127.0.0.1:8000/vueTask/${task.id}`)
            .then(response => {
            // Handle successful deletion
            console.log('Task deleted:', response.data);
            // Optionally, you can update the tasks list after deletion
            this.fetchTasks(); // Assuming you have a fetchTasks method to fetch updated tasks
        })
        .catch(error => {
            // Handle deletion error
            console.error('Error deleting task:', error);
        });

        },
        deleteTask(task) {
            axios.delete(`http://127.0.0.1:8000/vueTask/${task.id}`)
            .then(response => {
            // Handle successful deletion
            console.log('Task deleted:', response.data);
            // Optionally, you can update the tasks list after deletion
            this.fetchTasks(); // Assuming you have a fetchTasks method to fetch updated tasks
        })
        .catch(error => {
            // Handle deletion error
            console.error('Error deleting task:', error);
        });
        }

    }
  }
//   export default {
//     name: 'vueTask',
//     props: {
//       msg: String
//     }
//   }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.table th {
  background-color: #f2f2f2;
}

.table-body {
  background-color: #fff;
}

.table-body:hover {
  background-color: #f2f2f2;
}
  </style>
  