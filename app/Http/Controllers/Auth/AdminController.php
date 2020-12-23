<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Admin;
use App\Models\Settings;
use App\Models\Audit;
use Carbon\Carbon;
use Session;

class AdminController extends Controller
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
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }
 
    public function adminlogin()
    {
		$data['title'] = "Admin";
		return view('admin.index', $data);
	}


    public function submitadminlogin(Request $request){
		if (Auth::guard('admin')->attempt([
			'username' => $request->username,
			'password' => $request->password
		])) {
			return redirect()->intended('admin/dashboard');
		}else{
			return back()->with('alert', 'Oops! You have entered invalid credentials');
		}
    }
    

}
