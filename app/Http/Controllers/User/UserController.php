<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->directory.'.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        if($request->password)
        {
            $user->update([
                'password' => $request->password
            ]);
        }
        $user->update($request->except('password'));
        toastr()->success('Your Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function refer(Request $request)
    {
        $main_user = Auth::user();
        if($main_user->checkStatus() == 'expired')   
        {
          toastr()->error('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        $referrals = User::where('refer_by',$main_user->id)->orderBy('created_at','DESC')->get();
        return view($this->directory.'.refer.index')->with('main_user',$main_user)->with('referrals',$referrals);
    }
    public function refferral_detail(Request $request,$id)
    {
        $main_user = User::find($id);
        if($main_user->checkStatus() == 'expired')   
        {
          toastr()->error('User Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        if($request->status == 1)
        {
            $referrals = User::whereNotNull('a_date')->where('refer_by',$main_user->id)->orWhere('main_owner',$main_user->id)->orderBy('created_at','DESC')->get();
        }elseif($request->status == 2)
        {
            $referrals = User::whereNull('a_date')->where('refer_by',$main_user->id)->orWhere('main_owner',$main_user->id)->orderBy('created_at','DESC')->get();
        }else{
            $referrals = User::where('refer_by',$main_user->id)->orWhere('main_owner',$main_user->id)->orderBy('created_at','DESC')->get();
        }
        return view($this->directory.'.refer.index')->with('main_user',$main_user)->with('referrals',$referrals);
    }
    public function left_refferal($id)
    {
        $main_user = User::find($id);
        if($main_user->checkStatus() == 'expired')   
        {
          toastr()->error('User Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        return view($this->directory.'.refer.left_refferal')->with('main_user',$main_user);
    }
    public function right_refferal($id)
    {
        $main_user = User::find($id);
        if($main_user->checkStatus() == 'expired')   
        {
          toastr()->error('User Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        return view($this->directory.'.refer.right_refferal')->with('main_user',$main_user);
    }
    public function getTree(Request $request)
    {
       try {
            $user = User::find($request->id);
            $left = null;
            $right = null;
            if($user->left_refferal)
            {
                $left = User::find($user->left_refferal);
            }
            if($user->right_refferal)
            {
                $right = User::find($user->right_refferal);
            }
            $html = view($this->directory.'.refer.user_tree', compact('user','left','right'))->render();;
            return response([
				'html' => $html,
			], 200);
		} catch (\Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			]);
		}
    }
    public function getPackage1Tree(Request $request)
    {
       try {
            $user = User::find($request->id);
            $left = null;
            $right = null;
            if($user->left_refferal_package_1)
            {
                $left = User::find($user->left_refferal_package_1);
            }
            if($user->right_refferal_package_1)
            {
                $right = User::find($user->right_refferal_package_1);
            }
            $html = view($this->directory.'.auto_pool.partials.user_package_1_tree', compact('user','left','right'))->render();;
            return response([
				'html' => $html,
			], 200);
		} catch (\Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			]);
		}
    }
    public function getPackage2Tree(Request $request)
    {
       try {
            $user = User::find($request->id);
            $left = null;
            $right = null;
            if($user->left_refferal_package_2)
            {
                $left = User::find($user->left_refferal_package_2);
            }
            if($user->right_refferal_package_2)
            {
                $right = User::find($user->right_refferal_package_2);
            }
            $html = view($this->directory.'.auto_pool.partials.user_package_2_tree', compact('user','left','right'))->render();;
            return response([
				'html' => $html,
			], 200);
		} catch (\Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			]);
		}
    }
    public function autoPoolPackage1()
    {
        return view($this->directory.'.auto_pool.package_1');
    }
    public function autoPoolPackage2()
    {
        return view($this->directory.'.auto_pool.package_2');
    }

    
}