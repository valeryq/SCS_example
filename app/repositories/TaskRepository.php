<?php

/***
 * Class TaskRepository
 */
class TaskRepository implements ITaskRepository
{
    /**
     * @var Task
     */
    private $task;
    /**
     * @var TaskDescription
     */
    private $taskDescription;

    /**
     * @param Task $task
     * @param TaskDescription $taskDescription
     */
    function __construct(Task $task, TaskDescription $taskDescription)
    {
        $this->task = $task;
        $this->taskDescription = $taskDescription;
    }


    /**
     * Find task by id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->task->find($id);
    }

    /**
     * Create new task
     * @param $dateFrom
     * @param TaskType $dateTo
     * @param TaskType $taskType
     * @param PayerGroup $payerGroup
     * @return mixed
     * @internal param $attributes
     */
    public function create($dateFrom, $dateTo, TaskType $taskType, PayerGroup $payerGroup)
    {
        $this->task = new Task;
        $this->task->date_from = $dateFrom;
        $this->task->date_to = $dateTo;
        $this->task->payerGroup()->associate($payerGroup);
        $this->task->type()->associate($taskType);
        $this->task->save();
        return $this->task;
    }

    /**
     * Create description
     * @param Task $task
     * @param Language $language
     * @param $description
     * @return mixed
     */
    public function createDescription(Task $task, Language $language, $description)
    {
        $this->taskDescription = new TaskDescription;
        $this->taskDescription->language()->associate($language);
        $this->taskDescription->description = $description;
        $task->descriptions()->save($this->taskDescription);
        return $this->taskDescription;
    }

    /**
     * Get list of tasks
     * @param $offset
     * @param $take
     * @return mixed
     */
    public function getList($offset, $take = 10)
    {
        return $this->task->with(['descriptions.language', 'payerGroup', 'type'])->skip($offset)->take($take)->get();
    }

    /**
     * Get list of tasks by criteria
     * @param $payerGroupId
     * @param $dateFrom
     * @param $dateTo
     * @param $languageId
     * @return mixed
     * @internal param $month
     * @internal param $quarter
     */
    public function getListByCriteria($payerGroupId, $dateFrom, $dateTo, $languageId)
    {
        $tasks = $this->task->where('payer_group_id', $payerGroupId);

        $tasks = $tasks->with(['descriptions' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }, 'payerGroup', 'type']);

        if (!empty($dateFrom)) {
            $tasks = $tasks->where('date_to', '>=', $dateFrom);
        }

        if (!empty($dateTo)) {
            $tasks = $tasks->where('date_from', '<=', $dateTo);
        }

        return $tasks->get();
    }


}