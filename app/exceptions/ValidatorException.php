<?php

/**
 * Class ValidatorException
 */
class ValidatorException extends Exception
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * Constructor for ValidatorException
     * @param \Illuminate\Validation\Validator|Validator $validator
     * @param int $code
     */
    public function __construct(Illuminate\Validation\Validator $validator, $code = 0)
    {
        $this->validator = $validator;
        $this->code = $code;
    }

    /**
     * Get errors
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->validator->messages();
    }
}