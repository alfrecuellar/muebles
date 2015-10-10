<?php namespace App\Http\Requests\Client;

class UpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(StoreRequest::baseRules(), []);
    }
}
