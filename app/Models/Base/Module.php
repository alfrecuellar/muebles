<?php namespace App\Models\Base;

use App\Models\Classes\Model;

class Module extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';


    /**
     * Get the project record associated with the module.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    /**
     * The resources that belong to the module.
     */
    public function resources()
    {
        return $this->belongsToMany('App\Models\Resource', 'module_resource', 'module_id', 'resource_id');
    }

    /**
     * Get the moduleResources for module.
     */
    public function moduleResources()
    {
        return $this->hasMany('App\Models\ModuleResource', 'module_id', 'id');
    }

    /**
     * Get the pieces for module.
     */
    public function pieces()
    {
        return $this->hasMany('App\Models\Piece', 'module_id', 'id');
    }


}
