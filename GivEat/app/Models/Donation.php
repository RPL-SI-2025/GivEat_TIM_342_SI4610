<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, softDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'donations';
    protected $primaryKey = 'id_donation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'donor_id',
        'food_name',
        'description',
        'quantity',
        'expiration_date',
        'location_id',
        'image',
    ];

    /**
     * Get the route key name
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id_donation';
    }

    /**
     * Get the location associated with the donation.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id_location');
    }
}