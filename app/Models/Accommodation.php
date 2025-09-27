<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'rating',
        'address',
    ];

    public function accommodationTypes(){
        return $this->hasMany(AccommodationType::class);
    }

    public function accommodationTypeImages(){
        return $this->hasManyThrough(AccommodationTypeImage::class, AccommodationType::class);
    }

    public function accommodationOptions(){
        return $this->hasManyThrough(AccommodationOption::class, AccommodationType::class);
    }

    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

}
