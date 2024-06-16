<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
  
  public $directory;

  public function __construct()
  {
      $this->directory = 'expert-user-panel';
  }
    public function payment($package)
    {
      return view($this->directory.'.package.payment')->with('package',$package);
    }
    public function index()
    {
      $packages = Package::orderBy('price', 'ASC')->get();
      $purchased_package =  [];
      if(Auth::user()->package)
      {
        $purchased_package = $packages->where('price','>',Auth::user()->package->price)->first();
      }else{
        $purchased_package = $packages->first();
      }
      return view($this->directory.'.package.index',compact('purchased_package','packages'));
    }
    public function upgrade()
    {
      return view($this->directory.'.package.upgrade');
    }
}
