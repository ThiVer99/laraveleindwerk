<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['photo_id','name', 'body','price','gender_id'];

    public function keywords(){
        return $this->morphToMany(Keyword::class,'keywordable');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function productcategories(){
        return $this->belongsToMany(ProductCategory::class,'product_productcategory','product_id', 'productcategory_id');
    }
    public function colors(){
        return $this->belongsToMany(Color::class,'product_color');
    }
    public function sizes(){
        return $this->belongsToMany(Size::class,'product_size');
    }
    public function orders(){
        return $this->belongsToMany(Order::class,'order_product')->withPivot(['product_price','size_id','quantity']);
    }
}
