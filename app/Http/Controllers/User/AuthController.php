<?php

namespace App\Http\Controllers\User;
use App\Helpers\Message;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class AuthController extends Controller
{
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    public function loginView()
    {
        return view($this->directory.'.auth.login');
    }
    public function registerView()
    {
        return view($this->directory.'.auth.register');
    }
    public function login(Request $request){
        $user = User::where('name',$request->name)->first();
        if($user){
            if($user->status == 'block')
            {
                toastr()->error('You are Blocked,Kindly Contact Support');
                return redirect()->back();
            }
        }
        if(!$user){
            toastr()->error('Please register your account');
            return redirect()->back();
        }

        $creds = [
            'name' => $request->name,
            'password' => $request->password
        ];
        if(Auth::guard('user')->attempt($creds)){
            $user = Auth::guard('user')->user();
            // if($user->status == 'active'){
            //     if(Carbon\Carbon::today()->diffInDays($user->packageExpires() < 0))
            //     {
            //         $user->status == 'pending';
            //     }
            // }
            toastr()->success('Login Successfully');
            return redirect('user/dashboard');
        } else {
            toastr()->error('Wrong Password','Please Contact Support');
            return redirect()->back();
            
        }
    }
    public function register(Request $request)
    {
        if($request->password != $request->confirm_password)
        {
            toastr()->error('Password do not match');
            return redirect()->back();
        }
        if($request->code)
        { 
         
            $user= User::where('refferral_link',$request->code)->first();
            if($user){
                $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:users'
                ]);
                if($validator->fails()){
                    toastr()->error('Username  already exists');
                    return redirect()->back();
                }
                User::create([
                    'refferral_link' => uniqid(),
                    'refer_by' => $user->id,
                    'balance' => 0,
                ]+$request->all());
                
            }
        }else{
           $validator = Validator::make($request->all(),[
                'name' => 'required|unique:users'
            ]);

            if($validator->fails()){
                toastr()->error('Username  already exists');
                return redirect()->back();
            }
            toastr()->error('Contact Support.');
            return redirect()->back();
        }
        toastr()->success('Your Account Has Been successfully Created, Please Login and See Next Step Guides.');
        return redirect(route('user.login'));
    }
    public function code($code)
    {
        $user= User::where('refferral_link',$code)->first();
        return view($this->directory.'.auth.register')->with('code',$code)->with('user',$user);
    }
    public function logout()
    {
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }

    public function sendVerification(Request $request){
        $user = User::where('name',$request->email)->first();
        if(!$user){
            toastr()->warning('User not found');
            return redirect()->back();
        }
        $user->verification = uniqid();
        $user->save();
        MailHelper::sendVerification($user);
        return redirect()->route('user.reset');
    }

    public function resetPassword(Request $request){
        $user = User::where('verification',$request->verfication)->first();
        if($user){
            $user->update([
                'password' => $request->password
            ]);
            toastr()->warning('Password reset successfully');
            return redirect('user/login');
        } else {
            toastr()->warning('Incorrect code');
            return redirect()->back();
        }
    }

}
