<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Address;
use App\Models\Item;

class Order extends Model
{
    protected $table = 'orders';

    public $fillable = [
        'id_person',
        'id_address'
    ];

    public function person()
    {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function items()
    {
        // return $this->belongsToMany(
        //     Item::class,
        //     'order_items',
        //     'order_id',
        //     'item_id'
        // );

        return $this->belongsToMany(Item::class)->withPivot([
            'quantity',
            'price'
        ]);
    }
}
