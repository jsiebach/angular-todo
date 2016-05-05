<!DOCTYPE html>
<html ng-app="todoApp">
    <head>
        <title>Angular To-Do Demo</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <div class="container">
            <div class="content grid" ng-controller="TodoListController as tlc">
                <div class="gridItem--lg-span-3 gridItem--md-span-4" ng-repeat="list in tlc.todoLists">
                    <i class="fa" ng-class="list.icon" ></i> Name: @{{ list.name }} <i class="fa fa-times" ng-click="tlc.removeList(list)"></i>
                    <div class="task" ng-repeat="todo in list.todos">
                        Task: @{{todo.task}}
                    </div>
                </div>
            </div>
        </div>
    <script src="/js/main.js"></script>
    </body>
</html>
