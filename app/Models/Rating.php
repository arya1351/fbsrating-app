<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

     use HasFactory;

    protected $fillable = [
        'product',
        'rating_desc',
        'stars',
        'user_id',
    ];

    public function images()
    {
        return $this->hasMany(RatingImage::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
