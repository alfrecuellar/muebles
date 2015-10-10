<?php namespace App\Models\Classes;

use Request;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class Model extends BaseModel
{
    public static function findFail($id, $columns = ['*'])
    {
        try
        {
            $class = get_called_class();
            $model = $class::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            if(Request::ajax())
            {
                $class = str_replace("App\\Models\\", "", get_called_class());
                throw new HttpResponseException(new JsonResponse("No query results for model {$class}.", 422));
            }
            else
            {
                throw $e;
            }
        }

        return $model;
    }
}