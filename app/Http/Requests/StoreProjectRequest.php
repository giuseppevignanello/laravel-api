<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:projects'],
            'description' => ['nullable'],
            'status' => [],
            'duration' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'repo_link' => 'nullable',
            'view_link' => 'nullable'
        ];
    }
}
