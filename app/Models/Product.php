<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['photo_id','name', 'body','price','men','women'];

    public function keywords(){
        return $this->morphToMany(Keyword::class,'keywordable');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function productcategories(){
        return $this->belongsToMany(ProductCategory::class,'product_productcategory','product_id', 'productcategory_id');
    }
}
