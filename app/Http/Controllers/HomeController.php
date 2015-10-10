<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class HomeController extends Controller
{
    /**
     * show the invite request to the user
     *
     * @return Response
     */
    public function getIndex()
    {
        $this->data->clients = Client::all();
        return $this->view('home.index');
    }
}
