<?php namespace App\Http\Requests\Resource;

use App\Http\Requests\Request as BaseRequest;

class Request extends BaseRequest
{
    public function attributes()
    {
        return [
            'name'        => trans('resource.fields.name'),
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => trans('resource.error.name_required'),
            'name.max'             => trans('resource.error.name_max'),
        ];
    }

}
