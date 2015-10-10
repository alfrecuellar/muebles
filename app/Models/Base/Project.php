<?php namespace App\Models\Base;

use App\Models\Classes\Model;

class Project extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';


    /**
     * Get the client record associated with the project.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id', 'id');
    }

    /**
     * The resources that belong to the project.
     */
    public function resources()
    {
        return $this->belongsToMany('App\Models\Resource', 'project_resource', 'project_id', 'resource_id');
    }

    /**
     * Get the modules for project.
     */
    public function modules()
    {
        return $this->hasMany('App\Models\Module', 'project_id', 'id');
    }

    /**
     * Get the projectResources for project.
     */
    public function projectResources()
    {
        return $this->hasMany('App\Models\ProjectResource', 'project_id', 'id');
    }


}
