<?php

/**
 * Class ModelNotFoundException
 */
class ModelNotFoundException extends Exception
{

    /**
     * Constructor for ModelNotFoundException
     * @param int $code
     */
    public function __construct($code = 404)
    {
        $this->code = $code;
        $this->message = 'Entity not found';
    }
}