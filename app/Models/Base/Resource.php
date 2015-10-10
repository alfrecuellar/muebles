<?php namespace App\Models\Base;

use App\Models\Classes\Model;

class Resource extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resources';


    /**
     * The modules that belong to the resource.
     */
    public function modules()
    {
        return $this->belongsToMany('App\Models\Module', 'module_resource', 'resource_id', 'module_id');
    }

    /**
     * The pieces that belong to the resource.
     */
    public function pieces()
    {
        return $this->belongsToMany('App\Models\Piece', 'piece_resource', 'resource_id', 'piece_id');
    }

    /**
     * The projects that belong to the resource.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'project_resource', 'resource_id', 'project_id');
    }

    /**
     * Get the boards for resource.
     */
    public function boards()
    {
        return $this->hasMany('App\Models\Board', 'resource_id', 'id');
    }

    /**
     * Get the moduleResources for resource.
     */
    public function moduleResources()
    {
        return $this->hasMany('App\Models\ModuleResource', 'resource_id', 'id');
    }

    /**
     * Get the pieceResources for resource.
     */
    public function pieceResources()
    {
        return $this->hasMany('App\Models\PieceResource', 'resource_id', 'id');
    }

    /**
     * Get the projectResources for resource.
     */
    public function projectResources()
    {
        return $this->hasMany('App\Models\ProjectResource', 'resource_id', 'id');
    }


}
