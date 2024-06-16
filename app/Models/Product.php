<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','category_id','brand_id','user_id','price','phone','description','city',
        'indirect_income_level','product_income','expense_income','flash_income','reward_income',
        'loss_income','salary','personal_reward','direct_income','is_stock','fake_price','delivery_charges',
        'from_balance'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function product_levels()
    {
        return $this->hasMany(ProductLevel::class);
    }
}
