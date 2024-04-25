<?php

namespace App\Http\Requests\posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['sometimes', 'required','string', 'min:3', 'max:255', Rule::unique('posts')->ignore($this->post)],
            'description'  => 'sometimes|required|string|min:10|max:255',
            'user_id' => ['sometimes', 'required','exists:users,id'],
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
