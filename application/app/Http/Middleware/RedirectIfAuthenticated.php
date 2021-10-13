<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class RedirectIfAuthenticated
{
    public function handle($request, \Closure $next, $guard = null)
    {
        if (\Illuminate\Support\Facades\Auth::guard($guard)->check()) {
            return redirect("/home");
        }
        return $next($request);
    }
}

?>