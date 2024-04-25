<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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
            'name'  => 'required|string|min:2|max:255',

            'email' => ['required','email','max:255' , Rule::unique('users')->ignore($this->user)],

            'password' => ['required', Password::min(8) ,'max:20' , 'confirmed'],

            'password_confirmation' => ['required','same:password'],
        ];
    }
}
