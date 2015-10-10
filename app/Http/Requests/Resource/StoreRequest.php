<?php namespace App\Http\Requests\Resource;

class StoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return self::baseRules();
    }

    public static function baseRules()
    {
        return [
            'name'        => 'required|max:45',
        ];
    }
}
