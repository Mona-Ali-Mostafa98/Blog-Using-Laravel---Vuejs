<?php

namespace App\Http\Requests\comments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCommentRequest extends FormRequest
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
            'comment'  => 'sometimes|required|string|min:10|max:255',
            'user_id' => ['sometimes','required','exists:users,id'],
            'post_id' => ['sometimes','required','exists:posts,id'],
        ];
    }
}
