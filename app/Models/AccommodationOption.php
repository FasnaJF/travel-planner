<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_type_id',
        'name',
        'description',
        'price_adjustment',
    ];

    public function accommodationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccommodationType::class);
    }

    public function itineraryItems()
    {
        return $this->hasMany(ItineraryItem::class);
    }
}
