<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes','required','string','min:2','max:255'],

            'email' => ['sometimes','required' ,'email','max:255' , Rule::unique('users')->ignore($this->user)],

            'password' => ['sometimes' , 'nullable', 'min:8' ,'max:20', 'confirmed'], //error undefined array key table when update password  because Password::min
            'password_confirmation' => ['sometimes' ,  'nullable','same:password'],
        ];
    }
}
