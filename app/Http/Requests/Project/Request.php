<?php namespace App\Http\Requests\Project;

use App\Http\Requests\Request as BaseRequest;

class Request extends BaseRequest
{
    public function attributes()
    {
        return [
            'name'        => trans('project.fields.name'),
            'description' => trans('project.fields.description'),
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => trans('project.error.name_required'),
            'name.max'             => trans('project.error.name_max'),
            'description.required' => trans('project.error.description_required'),
            'description.max'      => trans('project.error.description_max'),
        ];
    }

}
