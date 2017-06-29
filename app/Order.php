<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

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

    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    /*********************************************
     * Scopes
     *********************************************/

    public function scopeLatestBuyOrders($query)
    {
        return $query->where('type', 'Buy')->orderBy('start_date', 'desc')->limit(20);
    }

    public function scopeLatestSellOrders($query)
    {
        return $query->where('type', 'Sell')->orderBy('start_date', 'desc')->limit(20);
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
