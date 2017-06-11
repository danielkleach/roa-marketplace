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
        'user_id', 'item_id', 'location_id', 'type', 'quantity', 'price'
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
        return $this->created_at->diffForHumans();
    }

    /*********************************************
     * Scopes
     *********************************************/

    public function scopeLatestBuyOrders($query)
    {
        return $query->where('type', 'Buy')->limit(10);
    }

    public function scopeLatestSellOrders($query)
    {
        return $query->where('type', 'Sell')->limit(10);
    }
}
