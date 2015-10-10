<?php namespace App\Models\Base;

use App\Models\Classes\Model;

class Client extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';


    /**
     * Get the projects for client.
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'client_id', 'id');
    }


}
