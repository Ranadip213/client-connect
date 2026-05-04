<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [
    'category_name',
    'minimum_amount',
    'duration_value',
    'duration_unit'
];
}
