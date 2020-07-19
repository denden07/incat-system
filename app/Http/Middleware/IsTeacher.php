<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Auth;

class IsTeacher
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
            if($user->isTeacher())
            {
                return $next($request);
            }
            return redirect('landing-admin-page');
        }

        return redirect('login-system');

//        return $next($request);
    }
}
