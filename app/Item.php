<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'rarity'
    ];

    /*********************************************
     * Relationships
     *********************************************/

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
