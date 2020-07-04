<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer', 'address', 'booking', 'comments','state'
    ];
}
