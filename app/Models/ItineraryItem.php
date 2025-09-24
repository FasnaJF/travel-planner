<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }

    public function accommodationType()
    {
        return $this->belongsTo(AccommodationType::class);
    }

    public function accommodationOption()
    {
        return $this->belongsTo(AccommodationOption::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
