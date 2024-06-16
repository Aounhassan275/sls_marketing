<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    public function showProducts()
    {
        $product_ids = Auth::user()->orders->pluck('product_id')->toArray();
        $products = Product::whereIn('id',$product_ids)->paginate(30);
        return view($this->directory.'.product.index',compact('products'));
    }
    public function showProductDetails($name)
    {
        $product = Product::where('name',str_replace('_', ' ',$name))->first();
        return view($this->directory.'.product.show',compact('product'));
    }
    public function orderProducts($id)
    {
        $product = Product::find($id);
        return view($this->directory.'.product.create_order',compact('product'));
    }
}
