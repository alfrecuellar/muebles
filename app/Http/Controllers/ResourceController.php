<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\Resource\StoreRequest as ResourceStoreRequest;
use App\Http\Requests\Resource\UpdateRequest as ResourceUpdateRequest;
use App\Models\Resource;
use App\Services\PaginateService;

class ResourceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Resource::orderBy("name");
        $paginate = new PaginateService($query);

        $this->data->resources = $paginate->data();
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
    public function show($id)
    {
        $this->data->resource = Resource::findFail($id);
        return $this->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ResourceStoreRequest $request)
    {
        $this->data->resource = Resource::create($request->all());
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
        $this->data->resource = Resource::findFail($id);
        return $this->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ResourceUpdateRequest $request, $id)
    {
        $resource = Resource::findFail($id);
        $resource->update($request->all());
        $this->data->resource = $resource;
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
        $resource = Resource::findFail($id);
        $resource->delete();
        $this->data->name = $resource->name;
        return $this->json();
    }

}
