'use strict';

angular
    .module('app', [
        'ngAnimate',
        'ngCookies',
        'ngTouch',
        'ngSanitize',
        'ngResource',
        'ui.router',
        'ui.bootstrap',
        'ui.bootstrap.datepicker',
        'app.task'
    ])
    .constant('API_URL', 'http://restfulapplication/api/v1')
    .config(function ($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('app', {
                url: '',
                abstract: true
            });

        $urlRouterProvider.otherwise('/tasks');
    });
