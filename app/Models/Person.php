<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    public $fillable = [
        'id',
        'name'
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class, 'person_id', 'id');
    }
}
