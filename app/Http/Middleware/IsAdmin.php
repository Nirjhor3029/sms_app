<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return Auth::user();
        //Auth::user() &&  Auth::user()->admin == 1
        $user = User::with('role')->find(Auth::user()->id);
        if(isset($user->role)){
            if (strtolower($user->role->role) == 'admin') {
                return $next($request);
            }
        }
        
        // return $next($request);
        return redirect('/');
        // return redirect()->back();
    }
}
