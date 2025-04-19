<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'partner_restaurant_id', 'rating', 'comment'
    ];

    public function restaurant()
    {
        return $this->belongsTo(PartnerRestaurant::class, 'partner_restaurant_id');
    }
}

