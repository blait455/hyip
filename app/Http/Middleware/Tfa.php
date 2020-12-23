<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class Tfa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=Auth::guard('user')->user();
        if($user->fa_status == 1 && $user->fa_expiring > \Carbon\Carbon::now()){
            return $next($request);
        }elseif($user->fa_status == 1 && $user->fa_expiring < \Carbon\Carbon::now()){
            return redirect()->route('2fa');
        }else{
            return $next($request);
        }
    }
}
