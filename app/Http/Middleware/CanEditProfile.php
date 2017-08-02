<?php
namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanEditProfile
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
       // if (Auth::user()->id == $request->route('vartotojo_profili')) {
            return $next($request);
       // }

       // abort(401);
    }
}