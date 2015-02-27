<?php

/**
 * Interface ITaskTypeRepository
 */
interface ITaskTypeRepository
{
    /**
     * Find task type by abbr
     * @param $abbr
     * @return mixed
     */
    public function findByAbbr($abbr);
}