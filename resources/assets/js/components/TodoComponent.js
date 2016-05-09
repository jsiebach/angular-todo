class TodoController {

  constructor() {

  }

}

export default {
  template: `
    <div class="Todo task">
      <input id="{{'task' + $ctrl.todo.id}}" type="checkbox" />
      <label for="{{'task' + $ctrl.todo.id}}">{{$ctrl.todo.task}}</label>
      <span class="Todo-deleteButton u-floatRight">
        <i class="fa fa-times" ng-click="$ctrl.deleteTodo()"></i>
      </span>
    </div>
  `,
  bindings: {
    todo: '=',
    deleteTodo: '&'
  }
}