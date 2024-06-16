<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{ 
    protected $fillable = [
        'image','package_level_reward_id','level','user_id','name','status'
    ];
    public function reward()
    {
        return $this->hasMany(PackageLevelReward::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function pending()
    {
        return Reward::where('status',0)->get();
    }
    public static function complete()
    {
        return Reward::where('status',1)->get();
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveProductImage($value,'/uploaded_images/');
    }
}
