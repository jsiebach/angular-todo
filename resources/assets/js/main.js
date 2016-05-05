const angular = require('angular')
require('angular-resource')
require('angular-animate')

import TodoListController from "./controllers/TodoListController"
import todoListService from "./services/TodoListService"

var todoApp = angular.module('todoApp', ['ngResource','ngAnimate'])
    .service('todoListService', todoListService)
    .controller('TodoListController', TodoListController);