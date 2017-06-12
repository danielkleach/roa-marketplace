<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Order extends Model
{
    use AlgoliaEloquentTrait;

    public static $perEnvironment = true;

    public $algoliaSettings = [
        'searchableAttributes' => [
            'item',
            'character_name'
        ],
    ];

    public function getAlgoliaRecord()
    {
        $this->user->profile;
        $this->item;

        return $this;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'item_id', 'location_id', 'type', 'quantity', 'price', 'start_date', 'end_date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'start_date',
        'end_date',
    ];

    /*********************************************
     * Relationships
     *********************************************/

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /*********************************************
     * Methods
     *********************************************/

    public function getFormattedDateAttribute()
    {
        return $this->start_date->diffForHumans();
    }

    public function getExpiredDateAttribute()
    {
        return $this->end_date->diffForHumans();
    }

    /*********************************************
     * Scopes
     *********************************************/

    public function scopeLatestBuyOrders($query)
    {
        return $query->where('type', 'Buy')->orderBy('start_date', 'desc')->limit(10);
    }

    public function scopeLatestSellOrders($query)
    {
        return $query->where('type', 'Sell')->orderBy('start_date', 'desc')->limit(10);
    }

    public function scopeOpen($query)
    {
        return $query->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now());
    }

    public function scopeClosed($query)
    {
        return $query->where('end_date', '<', Carbon::now());
    }
}
