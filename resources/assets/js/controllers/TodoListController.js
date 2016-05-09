class TodoListController {
  
  constructor(TodoListService){

    // Save dependencies
    this.TodoListService = TodoListService

    // Set initial state
    this.todoLists = []
    this.loadingTodos = true

    // Load To-Do lists
    this.fetchTodoLists()

  }

  fetchTodoLists() {
    this.TodoListService.fetchAll().$promise
        .then(response => {
          this.loadingTodos = false
          this.todoLists = response
        })
  }

  removeList(list){
    var index = this.todoLists.indexOf(list)
    this.todoLists.splice(index, 1)
    this.TodoListService.deleteTodoList(list)
  }
  
}

export default TodoListController