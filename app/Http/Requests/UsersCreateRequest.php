<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
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
           'name' => 'required|max:255',
           'password' => 'required|max:255' ,
           'email'    => 'required|max:255'    
        ];
    }
    

    public function messages()
    {
        return [

           'name.required' => 'vui lòng nhập username',
           'password.required' => 'vui lòng nhập Password',
           'email.required'    => 'vui lòng nhập email'    


            
        ];
    }
}
