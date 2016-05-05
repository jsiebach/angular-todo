import config from "./../config"

class TodoListService {

  constructor ($resource) {
    this.TodoLists = $resource(config.API_URL + "/todoList/:todoListId");
  }

  fetchAll () {
    return this.TodoLists.query();
  }

  deleteTodoList ({id}) {
    return this.TodoLists.remove({todoListId:id})
  }

}

export default TodoListService