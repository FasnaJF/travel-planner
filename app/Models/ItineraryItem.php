<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'itinerary_id',
        'item_type',
        'service_id',
        'accommodation_type_id',
        'accommodation_option_id',
        'start_date',
        'end_date',
        'details',
        'price',
    ];

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
