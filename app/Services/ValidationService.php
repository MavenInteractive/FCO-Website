<?php namespace App\Services;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Validator;


class ValidationService extends Validator
{
    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validatePassedCurrentTime($attribute, $value, $parameters)
    {
        // check if the time is an hour ahead of current time
        if(date('H:i', strtotime($value)) < date('H:i', time() + 3600))
        {
            $this->customMessages['passed_current_time'] = 'The Fight Time must be an hour ahead of current time.';
            return false;

        }

        return true;
    }
}