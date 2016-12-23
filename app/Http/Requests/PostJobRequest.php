<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostJobRequest extends FormRequest
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
                'description' =>'string',
                'categories' =>'string',
                'about_job' =>'string',
                'facilities' =>'required|string',
                'duties' =>'string',
                'salary' =>'required|string',
                'cost' =>'string',
                'overtime' =>'string',
                'quantity' =>'required|string',
                'duty_hours' =>'integer',                
                'requirement' =>'string',
                'country' =>'required|string',
                'image' => 'mimes:jpg,png,jpeg'
        ];
    }
}
