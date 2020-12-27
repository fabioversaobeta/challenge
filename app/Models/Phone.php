<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';

    public $fillable = [
        'person_id',
        'phone'
    ];

    public function person()
    {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }
}
