<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'type_id',
        'price',
        'avaible',
    ];
}