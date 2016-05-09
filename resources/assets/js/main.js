const angular = require('angular')
require('angular-resource')
require('angular-animate')

import TodoListController from "./controllers/TodoListController"
import TodoListService from "./services/TodoListService"
import todoList from "./components/TodoListComponent"

var todoApp = angular.module('todoApp', ['ngResource','ngAnimate'])
    .service('TodoListService', TodoListService)
    .controller('TodoListController', TodoListController)
    .component('todoList', todoList);