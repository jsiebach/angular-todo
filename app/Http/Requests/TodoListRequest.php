<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TodoListRequest extends Request
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
        switch($this->getMethod()){
            case 'POST':
                return [
                    'name' => 'required|unique:todo_lists,name|min:1|max:255'
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => 'required|unique:todo_lists,name,'.$this->get('id').'|min:1|max:255'
                ];
            default:
                return [];
        }
    }
}
