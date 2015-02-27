<?php

/*
|--------------------------------------------------------------------------
| Application RESTful Routes v1.0
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'api/v1'], function () {
    //Get resource for tasks
    Route::resource('tasks', 'TasksController');
});