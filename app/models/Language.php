<?php

/**
 * Class Language
 */
class Language extends \Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'languages';

    /**
     * Get all task descriptions by language
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taskDescriptions()
    {
        return $this->hasMany('TaskDescription', 'language_id');
    }
}