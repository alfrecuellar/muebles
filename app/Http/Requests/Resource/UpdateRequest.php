<?php namespace App\Http\Requests\Resource;

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
