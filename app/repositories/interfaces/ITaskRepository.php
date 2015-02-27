<?php

/**
 * Interface ITaskRepository
 */
interface ITaskRepository
{
    /**
     * Find task by id
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new task
     * @param $dateFrom
     * @param $dateTo
     * @param TaskType $taskType
     * @param PayerGroup $payerGroup
     * @return mixed
     */
    public function create($dateFrom, $dateTo, TaskType $taskType, PayerGroup $payerGroup);

    /**
     * Create description
     * @param Task $task
     * @param Language $language
     * @param $description
     * @return mixed
     */
    public function createDescription(Task $task, Language $language, $description);

    /**
     * Get list of tasks
     * @param $offset
     * @param $take
     * @return mixed
     */
    public function getList($offset, $take = 10);

    /**
     * Get list of tasks by criteria
     * @param $payerGroupId
     * @param $dateFrom
     * @param $dateTo
     * @param $languageId
     * @return mixed
     */
    public function getListByCriteria($payerGroupId, $dateFrom, $dateTo, $languageId);

}