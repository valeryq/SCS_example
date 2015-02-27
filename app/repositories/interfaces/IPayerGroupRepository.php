<?php

/**
 * Interface IPayerGroupRepository
 */
interface IPayerGroupRepository
{
    /**
     * Find payer group by type
     * @param $type
     * @return mixed
     */
    public function findByType($type);
}