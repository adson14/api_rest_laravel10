<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class PastDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $today = Carbon::today();
        $selectedDate = Carbon::parse($value);
        if(!$selectedDate->lte($today)){
            $fail('The :attribute must be a past date.');
        }

    }
}
