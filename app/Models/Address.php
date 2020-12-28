<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public $fillable = [
        'name',
        'address',
        'city',
        'country'
    ];
}
