<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\Project\StoreRequest as ProjectStoreRequest;
use App\Http\Requests\Project\UpdateRequest as ProjectUpdateRequest;
use App\Models\Project;
use App\Services\PaginateService;

class ProjectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Project::orderBy("created_at","desc");
        $paginate = new PaginateService($query);

        $this->data->projects = $paginate->data();
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
        $this->data->project = Project::findFail($id);
        return $this->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $this->data->project = Project::create($request->all());
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
        $this->data->project = Project::findFail($id);
        return $this->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProjectUpdateRequest $request, $id)
    {
        $project = Project::findFail($id);
        $project->update($request->all());
        $this->data->project = $project;
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
        $project = Project::findFail($id);
        $project->delete();
        $this->data->name = $project->name;
        return $this->json();
    }

}
