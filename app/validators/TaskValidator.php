<?php

/**
 * Class TaskValidator
 */
class TaskValidator implements IValidator
{
    /**
     * Register validator
     * @param \Illuminate\Routing\Route $route
     * @param \Illuminate\Http\Request $request
     * @return mixed
     * @throws ValidatorException
     */
    public function validate(\Illuminate\Routing\Route $route, \Illuminate\Http\Request $request)
    {
        /**
         * The validation rules.
         * @var array
         */
        $rules = [
            'task_type' => 'required|exists:task_types, abbr',
            'payer_group' => 'required|exists:payer_groups, group',
            'year' => 'required|numeric',
            'month' => 'numeric|min:1|max:12',
            'quarter' => 'numeric|min:1|max:4'
        ];

        $validator = Validator::make($request->all(), $rules);

        //If validator is failed
        if ($validator->fails()) {
            throw new ValidatorException($validator);
        }

    }
}