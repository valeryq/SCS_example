<?php

/**
 * Class TasksController
 */
class TasksController extends BaseController
{

    /**
     * @param \Illuminate\Http\Request $request
     */
    function __construct(Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     * GET /tasks
     *
     * @return Response
     */
    public function index()
    {
        $taskService = App::make('TaskService');
        return $taskService->getListByCriteria($this->request);
    }

}