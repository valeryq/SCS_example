<?php

/**
 * Class Task
 */
class Task extends \Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Get task payer group
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payerGroup()
    {
        return $this->belongsTo('PayerGroup', 'payer_group_id', 'id');
    }

    /**
     * Get task type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('TaskType', 'task_type_id', 'id');
    }

    /**
     * Get taks descriptions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descriptions()
    {
        return $this->hasMany('TaskDescription', 'task_id');
    }
}