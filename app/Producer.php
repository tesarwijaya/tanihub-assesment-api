<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = [
        'name',
        'location'
    ];

    /**
     * Get the Producers Products
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
