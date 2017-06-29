<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'character_name', 'race'
    ];

    /*********************************************
     * Relationships
     *********************************************/

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
