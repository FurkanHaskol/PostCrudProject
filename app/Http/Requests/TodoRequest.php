<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'todo_title' => ['required', 'string', 'max:150'],
            'todo_description' => ['required', 'string', 'max:250'],
            'category' => ['required'],
            'priority' => ['required'],
            'due_date' => ['required'],
        ];
    }
}
