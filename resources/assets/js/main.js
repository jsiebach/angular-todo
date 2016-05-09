const angular = require('angular')
require('angular-resource')
require('angular-animate')

import TodoListService from "./services/TodoListService"
import TodoService from "./services/TodoService"
import TodoApp from "./components/TodoAppComponent"
import TodoList from "./components/TodoListComponent"
import Todo from "./components/TodoComponent"

var todoApp = angular.module('todoApp', ['ngResource','ngAnimate'])
    .service('TodoListService', TodoListService)
    .service('TodoService', TodoService)
    .component('todoApp', TodoApp)
    .component('todo', Todo)
    .component('todoList', TodoList);