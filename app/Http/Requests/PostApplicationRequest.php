<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostApplicationRequest extends FormRequest
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
            'cv' => 'required|mimes:doc,pdf,docx',
            'full_name' =>'required',
            'email' =>'required|email',
            'contact' => 'required'                        
        ];
    }
}
