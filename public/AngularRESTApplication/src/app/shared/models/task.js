'use strict';

angular
    .module('app')
    .factory('Task', function ($resource, API_URL) {
        return $resource(API_URL + '/tasks/:id', {id: '@id'}, {
            //query: {
            //    url: API_URL + '/users',
            //    method: 'GET'
            //},
            get: {
                isArray: true
            },
            update: {
                method: 'PUT'
            }
        });
    })
;

