<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project)],
            'description' => ['nullable'],
            'duration' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
            'status' => ['required'],
            'repo_link' => ['nullable'],
            'view_link' => ['nullable'],
            'type_id' => ['exists:types,id'],
            'technologies' => ['exists:technologies,id']
        ];
    }
}
