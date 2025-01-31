<?php

namespace App\Models;

use App\Traits\ConversionTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ConversionTrait;

    protected $fillable = ['name', 'description', 'price', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function getPriceAttribute($value)
    // {
    //     return '$' . number_format($value, 2);
    // }
}
