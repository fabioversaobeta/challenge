<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory;

    protected $table = 'item_order';

    public $timestamps = false;

    public $fillable = [
        'id_order',
        'id_item',
        'quantity',
        'price'
    ];
}
