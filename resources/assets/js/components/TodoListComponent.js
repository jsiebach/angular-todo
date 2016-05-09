class TodoListController {

  constructor(TodoService) {
    this.TodoService = TodoService
  }

  deleteTodo(todo) {
    this.TodoService.deleteTodoList({listId: this.list.id, id:todo.id})
    var index = this.list.todos.indexOf(todo)
    this.list.todos.splice(index, 1)
  }

}

export default {
  template: `
  <div class="TodoList">
    <i class="TodoList-delete fa fa-times fa-2x u-floatRight" ng-click="$ctrl.deleteTodoList()"></i>
    <h3 class="TodoList-title">
      <i class="TodoList-icon fa fa" ng-class="$ctrl.list.icon"></i>
         {{ $ctrl.list.name }}
    </h3>
    <div class="TodoList-todos animated" ng-repeat="todo in $ctrl.list.todos">
      <todo todo="todo" delete-todo="$ctrl.deleteTodo(todo)"></todo>
    </div>
  </div>`,
  controller:TodoListController,
  bindings: {
    list: '=',
    deleteTodoList: '&'
  }
}