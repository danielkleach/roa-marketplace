<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Item extends Model
{
    use AlgoliaEloquentTrait;

    public static $perEnvironment = true;

    public $algoliaSettings = [
        'searchableAttributes' => [
            'item'
        ],
    ];

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
