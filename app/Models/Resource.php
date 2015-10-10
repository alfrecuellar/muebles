<?php namespace App\Models;

use App\Models\Base\Resource as ResourceBase;

class Resource extends ResourceBase
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['created', 'updated'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

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
        return $this->created_at->format('d-m-Y');
    }

    public function getUpdatedAttribute()
    {
        return $this->updated_at->format('d-m-Y');
    }


}
