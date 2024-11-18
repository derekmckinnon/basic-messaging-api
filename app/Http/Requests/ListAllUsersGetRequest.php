<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ListAllUsersGetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'requester_user_id' => 'required|integer|exists:users,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = join(" ", $validator->errors()->all());
        throw new ApiException(102, 'List Users Error', $message);
    }
}
