<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    protected $fillable = [
        'price','user_id','type','due_to'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function due()
    {
        return $this->belongsTo('App\Models\User','due_to');
    }
    public static function direct_income()
    {
        return (New static)::where('type','direct_income')->get();
    }
    public static function indirect_income()
    {
        return (New static)::where('type','indirect_income')->get();
    }
}
