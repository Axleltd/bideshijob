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
                'facilities' =>'string',
                'duties' =>'string',
                'salary' =>'integer',
                'cost' =>'integer',
                'overtime' =>'string',
                'quantity' =>'integer',
                'duty_hours' =>'string',
                'featured' =>'boolean',
                'requirement' =>'string',
        ];
    }
}
