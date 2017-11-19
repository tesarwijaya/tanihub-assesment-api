<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['status', 'sell_end_diff_human'];
    protected $fillable = [
        'producer_id',
        'type',
        'title',
        'picture',
        'value',
        'sellStart',
        'sellEnd'
    ];

    /**
     * Get the producer that owns the product.
     */
    public function producer()
    {
        return $this->belongsTo('App\Producer');
    }

    public function getPictureAttribute($value)
    {
        return url('api/image?name=' . $value);
    }

    public function getStatusAttribute()
    {
        $now = strtotime('now');
        $sellStart = strtotime($this->attributes['sellStart']);
        $sellEnd = strtotime($this->attributes['sellEnd']);
        if ($this->attributes['fund'] == $this->attributes['value']) {
            return 'funded';
        } else {
            if ($now < $sellStart || $now > $sellEnd) {
                return 'close';
            } else if ($now > $sellStart && $now < $sellEnd) {
                return 'open';
            }
        }
    }

    public function getSellEndDiffHumanAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['sellEnd'])->diffForHumans();
    }
}
