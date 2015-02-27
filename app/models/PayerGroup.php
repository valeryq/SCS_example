<?php

/**
 * Class PayerGroup
 */
class PayerGroup extends \Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'payer_groups';


    /**
     * Get tasks by payer group
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('Task', 'payer_group_id');
    }
}