<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResevationRequest extends FormRequest
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
            'r_name' => 'required',
            'num_of_book' => 'required',
            'date' => 'required',
            'clock_time' => 'required',
           
        ];
        return $rules;
    }
}
