<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationTypeImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_type_id',
        'image_url',
        'alt_text',
    ];


    public function accommodationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccommodationType::class);
    }
}
