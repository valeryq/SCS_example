'use strict';

angular
    .module('app.task', [])
    .constant('TASK_PARTIALS_PATH', '/app/components/task/partials')
    .config(function ($stateProvider, TASK_PARTIALS_PATH) {
        $stateProvider
            .state('taskList', {
                url: '/tasks',
                templateUrl: TASK_PARTIALS_PATH + '/list.html',
                controller: 'TaskListCtrl'
            });
    });