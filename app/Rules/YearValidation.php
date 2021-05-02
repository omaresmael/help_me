<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YearValidation implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match("^\d{0,4}\-\d{0,4}$^", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'برجاء ادخال التاريخ في الصيغه الاتية 2020-2021 ';
    }
}
