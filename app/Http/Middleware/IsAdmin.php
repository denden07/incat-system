<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $setting = Setting::where('status','active')->first();

        if(Auth::check()){
            $user = Auth::user();
            if($user->isAdmin())
            {
                return $next($request);
            }
            return redirect('teacher-dashboard');
        }

        return redirect('login-system');






//        return $next($request);
    }
}
