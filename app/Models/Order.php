<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','status','total_price','session_id','payment_intent','address_id'];
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'order_product')->withPivot(['product_price','size_id','quantity']);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
}
