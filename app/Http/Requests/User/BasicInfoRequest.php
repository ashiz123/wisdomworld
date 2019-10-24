<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;
use Auth;

class BasicInfoRequest extends BaseFormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // \Log::info('test');
        return [
            
            'contact' => 'required|numeric|digits:10',
            'date_of_birth' => 'required',
            'country' => 'required',
            'state' => 'required|max:20',
            'address' => 'required|max:20',
           
            
        ];
    }
}
