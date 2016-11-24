<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutJobRequest extends FormRequest
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
                'title' =>'required|string',
                'description' =>'required|string',
                'categories' =>'required|string',
                'about_job' =>'required|string',
                'facilities' =>'required|string',
                'duties' =>'required|string',
                'salary' =>'required|integer',
                'cost' =>'required|integer',
                'overtime' =>'required|string',
                'quantity' =>'required|integer',
                'duty_hours' =>'required|string',                
                'requirement' =>'required|string',
                'country' =>'required|string'
        ];        
    }
}
