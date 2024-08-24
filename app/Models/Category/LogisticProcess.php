<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kh_name',
        'code',
        'status',
    ];
}
