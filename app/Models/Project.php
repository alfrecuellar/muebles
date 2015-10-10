<?php namespace App\Models;

use App\Models\Base\Project as ProjectBase;

class Project extends ProjectBase
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'client_id'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['created','updated'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $hidden = ['client_id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function getCreatedAttribute()
    {
        return $this->created_at->format('d-m-Y H:i');
    }

    public function getUpdatedAttribute()
    {
        return $this->updated_at->format('d-m-Y H:i');
    }

    public function toArray()
    {
        $this->client;
        $this->resources;
        return parent::toArray();
    }
}
