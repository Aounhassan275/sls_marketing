<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLevel extends Model
{
    protected $fillable = [
        'level','amount','product_id'
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
