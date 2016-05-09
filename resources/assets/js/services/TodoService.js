import config from "./../config"

class TodoService {

  constructor ($resource) {
    this.Todos = $resource(config.API_URL + "/todoList/:todoListId/todo/:todoId");
  }

  fetchAll () {
    return this.Todos.query();
  }

  deleteTodoList ({id, listId}) {
    return this.Todos.remove({todoListId:listId, todoId:id})
  }

}

export default TodoService