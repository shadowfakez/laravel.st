<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Task field is empty! Please fill it in!',
            'content.required' => 'Content field is empty! Please fill it in!',
            'status_id.required' => 'Status field is not chosen! Please choose task status'
        ];
    }
}
