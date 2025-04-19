<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerRestaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'image', 'operational_hours', 'latitude', 'longitude'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
