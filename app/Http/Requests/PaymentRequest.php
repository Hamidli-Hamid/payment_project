<?php

namespace App\Http\Requests;

use App\Rules\CardDateRule;
use App\Rules\CardNumberRule;
use App\Rules\OrderCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'card_number' => ['required','string','min:19','max:19',new CardNumberRule],
            'date'        => ['required','string','min:5','max:5',new CardDateRule],
            'cvv'         => ['required','numeric','digits:3'],
            'full_name'   => ['required', 'string', 'min:3', 'max:100'],
        ];
    }
}
