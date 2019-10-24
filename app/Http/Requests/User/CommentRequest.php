<?php

namespace App\Http\Requests\User;

// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;
use Auth;

class CommentRequest extends BaseFormRequest
{
 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required'
        ];
    }
}
