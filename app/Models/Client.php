<?php namespace App\Models;

use App\Models\Base\Client as ClientBase;

class Client extends ClientBase
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email', 'address'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['created', 'updated', 'count'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $hidden = ['projects', 'created_at', 'updated_at'];

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

    public function getCountAttribute()
    {
        return $this->projects->count();
    }

}
