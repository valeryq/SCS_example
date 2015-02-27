<?php

/**
 * Class TaskTypeRepository
 */
class TaskTypeRepository implements ITaskTypeRepository
{
    /**
     * @var TaskType
     */
    private $taskType;

    /**
     * @param TaskType $taskType
     */
    function __construct(TaskType $taskType)
    {
        $this->taskType = $taskType;
    }


    /**
     * Find task type by abbr
     * @param $abbr
     * @return mixed
     */
    public function findByAbbr($abbr)
    {
        return $this->taskType->where('abbr', $abbr)->first();
    }
}