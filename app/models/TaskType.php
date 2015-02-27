<?php

/**
 * Class TaskType
 */
class TaskType extends \Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'task_types';

    /**
     * Get tasks by task type
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('Task', 'task_type_id');
    }
}