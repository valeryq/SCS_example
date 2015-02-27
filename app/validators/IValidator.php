<?php

/**
 * Interface IValidator
 * Interface for validation
 */
interface IValidator
{
    /**
     * Register validator
     * @param \Illuminate\Routing\Route $route
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function validate(\Illuminate\Routing\Route $route, \Illuminate\Http\Request $request);
}