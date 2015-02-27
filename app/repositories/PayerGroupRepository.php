<?php

class PayerGroupRepository implements IPayerGroupRepository
{
    /**
     * @var PayerGroup
     */
    private $payerGroup;

    /**
     * @param PayerGroup $payerGroup
     */
    function __construct(PayerGroup $payerGroup)
    {
        $this->payerGroup = $payerGroup;
    }


    /**
     * Find payer group by type
     * @param $type
     * @return mixed
     */
    public function findByType($type)
    {
        return $this->payerGroup->where('group', $type)->first();
    }
}