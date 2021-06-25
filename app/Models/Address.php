<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'addr_1',
        'addr_2',
        'postcode',
        'city',
        'state',
    ];
}
