export default {
  template: `
  <div class="TodoList">
    <h3 class="TodoList-title">
      <i class="TodoList-icon fa fa" ng-class="$ctrl.list.icon"></i>
         {{ $ctrl.list.name }}
      <i class="TodoList-delete fa fa-times u-floatRight" ng-click="removeList($ctrl.list)"></i>
    </h3>
    <div class="TodoList-todos" ng-repeat="todo in $ctrl.list.todos">
      <input id="{{'task' + todo.id}}" type="checkbox" /><label for="{{'task' + todo.id}}">{{todo.task}}</label>
    </div>
  </div>`,
  bindings: {
    list: '='
  }
}