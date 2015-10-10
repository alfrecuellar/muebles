<?php namespace App\Models\Base;

use App\Models\Classes\Model;

class Piece extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'piece';


    /**
     * Get the module record associated with the piece.
     */
    public function module()
    {
        return $this->belongsTo('App\Models\Module', 'module_id', 'id');
    }

    /**
     * The boards that belong to the piece.
     */
    public function boards()
    {
        return $this->belongsToMany('App\Models\Board', 'piece_board', 'piece_id', 'board_id');
    }

    /**
     * The resources that belong to the piece.
     */
    public function resources()
    {
        return $this->belongsToMany('App\Models\Resource', 'piece_resource', 'piece_id', 'resource_id');
    }

    /**
     * Get the pieceBoards for piece.
     */
    public function pieceBoards()
    {
        return $this->hasMany('App\Models\PieceBoard', 'piece_id', 'id');
    }

    /**
     * Get the pieceResources for piece.
     */
    public function pieceResources()
    {
        return $this->hasMany('App\Models\PieceResource', 'piece_id', 'id');
    }


}
