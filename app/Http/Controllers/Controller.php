<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __get($name)
    {
        if($name == "data")
        {
            $this->data = new \stdClass();
        }
        return $this->data;
    }

    protected function view($file = false, $data = false)
    {
        $data = (array) ($data ? $data : $this->data);
        if(!$file)
        {
            $file = \Route::current()->getAction()["as"];
        }
        return view($file, $data);
    }

    protected function json($data = false)
    {
        $data = (array) ($data ? $data : $this->data);
        return \Response::json($data);
    }
}
