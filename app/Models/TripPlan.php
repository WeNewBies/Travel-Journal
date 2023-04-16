<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPlan extends Model
{
    use HasFactory;
    protected $table = 'trip_plan';

    protected $fillable = [
        'user_id',
        'tripName',
        'place',
        'start_date',
        'end_date',
        'image'
    ];
}
