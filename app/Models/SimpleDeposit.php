<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class SimpleDeposit extends Model
{
    protected $fillable = [
        't_id','payment','user_id','amount','status','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::savePImage($value,'/deposit/');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
