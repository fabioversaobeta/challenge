<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model implements CastsAttributes
{
    use HasFactory;

    protected $table = 'addresses';

    public $fillable = [
        'address',
        'city',
        'country'
    ];
}
