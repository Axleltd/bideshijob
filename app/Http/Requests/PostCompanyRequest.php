<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCompanyRequest extends FormRequest
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
            'name' => 'required|max:255|min:2',
            'description' => 'required|max:255|min:10',          
            'email' => 'required|email',
            'address' =>'required|min:5',  
            'logo' => 'required|mimes:jpg,png,jpeg',                    
        ];
    }
}