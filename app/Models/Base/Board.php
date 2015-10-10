<?php namespace App\Models\Base;

use App\Models\Classes\Model;

class Board extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'board';


    /**
     * Get the resource record associated with the board.
     */
    public function resource()
    {
        return $this->belongsTo('App\Models\Resource', 'resource_id', 'id');
    }

    /**
     * The pieces that belong to the board.
     */
    public function pieces()
    {
        return $this->belongsToMany('App\Models\Piece', 'piece_board', 'board_id', 'piece_id');
    }

    /**
     * Get the pieceBoards for board.
     */
    public function pieceBoards()
    {
        return $this->hasMany('App\Models\PieceBoard', 'board_id', 'id');
    }


}
