<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    public function accommodationTypes(){
        return $this->hasMany(AccommodationType::class);
    }

    public function accommodationTypeImages(){
        return $this->hasMany(AccommodationTypeImage::class);
    }

    public function accommodationOptions(){
        return $this->hasMany(AccommodationOption::class);
    }

    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

}
