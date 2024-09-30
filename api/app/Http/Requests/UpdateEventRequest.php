<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:1',  'max:255'],
            'description' =>  ['required', 'string', 'min:1'],
            'location' => ['required', 'string', 'min:1'],
            'date' => ['required', 'date'],
            'user_id' => ['nullble', 'exists:users,id'],
        ];
    }
}
