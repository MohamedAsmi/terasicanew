<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $request = request();
        $rules = [
            'p_name' => 'required',
            'osio' => 'required',
            'hinda' => 'required',
            'v_muo' => 'required',
            'status' => 'required',
           
        ];
        return $rules;
    }
}
