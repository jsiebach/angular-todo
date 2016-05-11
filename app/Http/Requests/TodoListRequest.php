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

    public function messages()
    {
        $messages = parent::messages();
        $messages['icon.regex'] = "Icon must be a FontAwesome Icon";
        return $messages;
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
                    'name' => 'required|unique:todo_lists,name|min:1|max:255',
                    'icon' => ['required','regex:/^fa\-/']
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => 'unique:todo_lists,name,'.$this->get('id').'|min:1|max:255',
                    'icon' => ['regex:/^fa\-/']
                ];
            default:
                return [];
        }
    }
}
