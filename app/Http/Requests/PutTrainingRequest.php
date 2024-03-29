<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutTrainingRequest extends FormRequest
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
            'title' => 'required|max:255|min:2',
            'categories' => 'required|max:255|min:10',          
            'fees' => 'required|integer',
            'quantity' =>'required', 
            'training_description' =>'required',            
            'from' =>'required',            
            'to' =>'required',  
            'country' =>'required|string',
            'image' =>'mimes:jpg,png,jpeg'                    
        ];
    }
}
