<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostApplicationRequest extends FormRequest
{
    protected $atts;

    public function all() {
        $atts = parent::all();
        $this->atts = $atts;

        
        return $atts;
    }
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
        if($this->atts['apply'] == 'job')
            return [
                'cv' => 'required|mimes:doc,pdf,docx',
                'full_name' =>'required',
                'email' =>'required|email',
                'contact' => 'required'                        
            ];
        return [                
                'full_name' =>'required',
                'email' =>'required|email',
                'contact' => 'required'                        
            ];

    }
}
