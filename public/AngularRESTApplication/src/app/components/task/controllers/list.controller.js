'use strict';

angular.module('app.task')
    .controller('TaskListCtrl', function ($scope, $resource, Task) {

        /**
         * Search tasks by filter criteria
         * @param $event
         */
        $scope.search = function ($event) {
            var uiData = $($event.currentTarget);
            var data = {
                payer_group: uiData.find('[name="payer_group"]').val(),
                year: uiData.find('[name="year"]').val(),
                period: uiData.find('[name="period"]').val(),
                date_from: uiData.find('[name="date_from"]').val(),
                date_to: uiData.find('[name="date_to"]').val(),
                language: uiData.find('[name="language"]').val()
            };

            Task.get(data, function(response) {
                $scope.tasks = response;
            });
        };

        /**
         * When change period
         * @param $event
         */
        $scope.changePeriod = function () {
            console.log($scope.period);
        };

        /**
         * Open datepicker from
         * @param $event
         */
        $scope.openDatepickerFrom = function ($event) {
            $scope.openedDatepickerTo = false;
            $event.preventDefault();
            $event.stopPropagation();

            $scope.openedDatepickerFrom = true;
        };

        /**
         * Open datepicker to
         * @param $event
         */
        $scope.openDatepickerTo = function ($event) {
            $scope.openedDatepickerFrom = false;
            $event.preventDefault();
            $event.stopPropagation();

            $scope.openedDatepickerTo = true;
        };

        $scope.format = 'yyyy-MM-dd';
    })
;
