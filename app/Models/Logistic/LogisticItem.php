<?php

namespace App\Models\Logistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'description',
        'price',
        'item_price',
        'item_type',
        'payment_method',
        'from_location',
        'to_destination',
        'process',
        'status'
    ];
}
