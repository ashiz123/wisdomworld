<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;
use Auth;
class EducationInfoRequest extends BaseFormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'user_id' => 'required',
            // 'highest_level' => 'required',
            // 'main_subject' => 'required',
            // 'skills' => 'required',
            // 'completion_on' => 'required'

        ];
    }
}


