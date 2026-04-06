<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComputerPart extends Model
{
    protected $fillable = [
        'part_name',
        'part_type',
        'manufacturer',
        'price',
        'quantity',
        'description'
    ];
}
