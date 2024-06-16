<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageLevelReward extends Model
{
    protected $fillable = [
        'level','title','package_id','type'
    ];
    public function package()
    {
        return $this->belongsTo('App\Models\Package','package_id');
    }
}
