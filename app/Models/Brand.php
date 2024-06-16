<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name','category_id','image'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveProductImage($value,'/uploaded_images/brands/');
    }
}
