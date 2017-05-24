<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'item_id', 'type', 'price'
    ];

    /*********************************************
     * Relationships
     *********************************************/

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
