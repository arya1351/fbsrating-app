<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingImage extends Model
{
    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
}
