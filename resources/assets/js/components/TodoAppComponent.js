class TodoAppController {

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

  deleteTodoList(list){
    this.TodoListService.deleteTodoList(list)
    var index = this.todoLists.indexOf(list)
    this.todoLists.splice(index, 1)
  }

}

export default TodoAppController

export default {
  template:`
  <div class="content grid">
      <div ng-repeat="todoList in $ctrl.todoLists" class="gridItem--md-span-6 gridItem--sm-span-12 animated">
          <todo-list list="todoList" 
            delete-todo-list="$ctrl.deleteTodoList(todoList)"
            >
          </todo-list>
      </div>
  </div>
  `,
  controller:TodoAppController
}