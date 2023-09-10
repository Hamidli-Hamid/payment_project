<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CardDateRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = explode('/', $value);
        $date_month = $date[0];
        $date_year = $date[1];
        if ($date_year <= now()->format('y')) {

            if ($date_year == now()->format('y')) {
                if ($date_month < now()->format('m')) {
                    $fail('The card has expired');
                }
            } else {
                $fail('The card has expired');
            }
        }
    }
}
