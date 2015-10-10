<?php namespace App\Http\Requests\Client;

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
            'name'    => 'required|max:45',
            'phone'   => 'required|max:45',
            'email'   => 'required|email|max:255',
            'address' => 'required|max:255',
        ];
    }
}
