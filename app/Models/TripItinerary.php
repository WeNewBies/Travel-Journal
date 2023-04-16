<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripItinerary extends Model
{
    use HasFactory;

    protected $table = 'trip_itineraries';

    protected $fillable = [
        'tripId',
        'itinerary'
    ];
}
