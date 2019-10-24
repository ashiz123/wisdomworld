<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;
use Auth;

class PostRequest extends BaseFormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            
        ];
    }
}
