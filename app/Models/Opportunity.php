<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function itineraries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Itinerary::class);
    }

    public function client()
    {
        return $this->belongsTo(Contact::class,'client_id', 'id');
    }
}
