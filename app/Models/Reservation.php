<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $keyType = "string";

    protected $fillable = [
        'id',
        'costomer',
        'spot_id',
        'status_id',
        'person',
        'bill',
        'date',
    ];
}