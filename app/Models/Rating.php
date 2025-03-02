<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Define the table if not default
    protected $table = 'ratings';

    // Mass assignable attributes
    protected $fillable = [
        'store_id',   // ID of the store being rated
        'rating',     // The user's rating
        'ip' // Information about the user's device
    ];

    // Define relationships if needed (e.g., store relationship)
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
