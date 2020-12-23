<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use Carbon\Carbon;
use Session;

class faController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        //$this->middleware('guest:user');
    }

    public function faverify()
    {
		if(Auth::guard('user')->user()){
            $data['title']='2fa verification';
			return view('/auth/2fa', $data);
		}else{$data['title']='Login';
	        return view('/auth/login', $data);
		}
    }
    
    public function submitfa(Request $request)
    {
        $user = User::findOrFail(Auth::guard('user')->user()->id);
        $g=new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret=$user->googlefa_secret;
        $check=$g->checkcode($secret, $request->code, 3);
        if($check){
            $user->fa_expiring = Carbon::now()->addMinutes(30);
            $user->save();
            return redirect()->route('user.dashboard');
        }else{
            return back()->with('alert', 'Invalid code.');
        }
    }

}
