<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'name',
        'description',
        'category_id',
        'pickup_time',
        'image',
        'portion',
        'location',
        'status',
    ];

    // Relasi ke Partner
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
