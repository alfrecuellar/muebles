<?php namespace App\Http\Requests\Client;

use App\Http\Requests\Request as BaseRequest;

class Request extends BaseRequest
{
    public function attributes()
    {
        return [
            'name'    => trans('client.fields.name'),
            'phone'   => trans('client.fields.phone'),
            'email'   => trans('client.fields.email'),
            'address' => trans('client.fields.address'),
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => trans('client.error.name_required'),
            'name.max'         => trans('client.error.name_max'),
            'phone.required'   => trans('client.error.phone_required'),
            'phone.max'        => trans('client.error.phone_max'),
            'email.required'   => trans('client.error.email_required'),
            'email.max'        => trans('client.error.email_max'),
            'email.email'      => trans('client.error.email_email'),
            'address.required' => trans('client.error.address_required'),
            'address.max'      => trans('client.error.address_max'),
        ];
    }
}
