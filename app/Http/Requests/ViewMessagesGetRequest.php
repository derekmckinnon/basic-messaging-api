<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ViewMessagesGetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id_a' => 'required|integer|exists:users,id|different:user_id_b',
            'user_id_b' => 'required|integer|exists:users,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = join(" ", $validator->errors()->all());
        throw new ApiException(103, 'View Messages Error', $message);
    }
}
