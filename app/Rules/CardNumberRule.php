<?php

namespace App\Rules;

use App\Models\Card;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CardNumberRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $data = Card::where('card_number', str_replace(' ', '', $value))->first();
        if(!$data){
            $fail('Please enter a valid card number.');
        }
    }
}
