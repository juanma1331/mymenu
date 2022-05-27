<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'user_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getFormattedPriceAttribute(): Money
    {
        return Money::EUR($this->price); // €5.00

    }
}
