<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" />
    <br />
    <span :title="message" v-if="showSpan">falan filan</span><br />
    <input v-model="message" v-if="showMessage" /><br />
    Show Message: <input type="checkbox" v-model="showMessage" /><br />
    Show Span: <input type="checkbox" v-model="showSpan" />
    <br />
    <hr />
    <ul>
      <li
        v-for="(todo, indis) in todos"
        :key="indis"
        :class="{ overline: todo.status }"
      >
        <input type="checkbox" v-model="todo.status" /> {{ todo.text }}
      </li>
    </ul>
    <form @submit.prevent="addNewTodoItem">
      <input type="text" v-model="newTodoItem" />
      <button type="submit">Add</button>
    </form>
    <hr />
    <HelloWorld :msg="message" />
  </div>
</template>

<script>
import HelloWorld from "./components/HelloWorld.vue";

export default {
  name: "App",
  data() {
    return {
      showMessage: true,
      showSpan: false,
      message: "mobilll aman aman nereye geldik?",
      newTodoItem: null,
      todos: [
        {
          status: false,
          text: "Şunu bunu yap",
        },
        {
          status: true,
          text: "bunu da yap",
        },
        {
          status: false,
          text: "Şunu da yap",
        },
      ],
    };
  },
  methods: {
    addNewTodoItem: function () {
      if (this.newTodoItem == null) return;
      this.todos.push({ status: false, text: this.newTodoItem });
      this.newTodoItem = null;
    },
  },
  components: {
    HelloWorld,
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.overline {
  text-decoration: line-through;
}
</style>
