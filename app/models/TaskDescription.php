<?php

/**
 * Class TaskDescription
 */
class TaskDescription extends \Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'task_descriptions';


    /**
     * Get task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('Task', 'taks_id', 'id');
    }

    /**
     * Get language
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('Language', 'language_id', 'id');
    }
}