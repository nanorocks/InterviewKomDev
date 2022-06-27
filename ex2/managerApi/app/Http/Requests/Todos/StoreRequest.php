<?php

namespace App\Http\Requests\Todos;

use App\Models\Project;
use App\Models\Todo;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            Todo::DESCRIPTION => 'required|string|max:255',
            Project::RELATION_PROJECT_ID => 'required'
        ];
    }
}
