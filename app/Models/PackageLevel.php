<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageLevel extends Model
{
    protected $fillable = [
        'level','amount','package_id'
    ];
    public function package()
    {
        return $this->belongsTo('App\Models\Package','package_id');
    }
}
