<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListAllUsersGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // In a real application, we would actually check this properly
    }

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
}
