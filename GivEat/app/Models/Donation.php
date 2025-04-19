<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'donor_id',
        'food_name',
        'description',
        'quantity',
        'expiration_date',
        'location_id',
        'image',
    ];

}