<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "address",
        "number",
        "city",
        "postal_code",
        "state",
        "country",
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
