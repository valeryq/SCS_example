<?php

/**
 * Interface ITaskService
 */
interface ITaskService
{
    /**
     * Create new task by Payer group
     * @param $attributes - ['task_type' => 'sd|pssc|psx', 'payer_group' => '12|35|46', 'year', 'month', 'quarter'
     * 'descriptions' => ['lang' => 'ru|ua', 'description' => 'Подача декларации...']]
     * @return mixed
     */
    public function create($attributes);

    /**
     * Get list of tasks
     * @param $offset
     * @return mixed
     */
    public function getList($offset);

    /**
     * Get list of tasks by criteria
     * @param $attributes
     * @return mixed
     */
    public function getListByCriteria($attributes);
}