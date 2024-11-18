<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SendMessagePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender_user_id' => 'required|integer|exists:users,id|different:receiver_user_id',
            'receiver_user_id' => 'required|integer|exists:users,id',
            'message' => 'required|string|min:1',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = join(" ", $validator->errors()->all());
        throw new ApiException(104, 'Send Message Error', $message);
    }
}
