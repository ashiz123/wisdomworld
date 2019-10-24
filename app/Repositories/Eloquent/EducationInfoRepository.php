<?php

namespace App\Repositories\Eloquent;
use App\Repositories\RepositoryInterface;
use App\Education;
use App\Repositories\EducationInterface;
use Auth;


class EducationInfoRepository implements EducationInterface
{
    protected $education_info;

    public function __construct(Education $education_info)
    {
        $this->education_info = $education_info;
    }

    public function store($attributes)
    {
        $education_info = new Education;
        $education_info->user_id = Auth::user()->id;
        $education_info->highest_level =  $attributes['highest_level'];
        $education_info->main_subject = $attributes['main_subject'];
        $education_info->skills = $attributes['skills'];
        $education_info->completion_on = $attributes['completion_on'];
        $education_info->save();
    }

}

