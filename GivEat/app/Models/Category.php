<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description'
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
