<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\Client\StoreRequest as ClientStoreRequest;
use App\Http\Requests\Client\UpdateRequest as ClientUpdateRequest;
use App\Models\Client;
use App\Services\PaginateService;

class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Client::orderBy("name");
        $paginate = new PaginateService($query);

        $this->data->clients = $paginate->data();
        $this->data->paging = $paginate->paging();

        if(Request::ajax())
        {
            return $this->json();
        }
        return $this->view();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function typeahead()
    {
        $clients = Client::all();
        $all = [];
        foreach ($clients as $client)
        {
            $row = new \stdClass;
            $row->id = $client->id;
            $row->name = $client->name;
            $all[] = $row;
        }
        $this->data->data = $all;
        return $this->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->data->client = Client::findFail($id);
        return $this->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClientStoreRequest $request)
    {
        $this->data->client = Client::create($request->all());
        return $this->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->data->client = Client::findFail($id);
        return $this->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ClientUpdateRequest $request, $id)
    {
        $client = Client::findFail($id);
        $client->update($request->all());
        $this->data->client = $client;
        return $this->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::findFail($id);
        $client->delete();
        $this->data->name = $client->name;
        return $this->json();
    }

}
