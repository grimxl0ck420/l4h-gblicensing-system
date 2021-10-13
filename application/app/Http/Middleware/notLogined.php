<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class notLogined
{
    public function handle($request, \Closure $next)
    {
        if (!\Auth::check()) {
            return $next($request);
        }
        return redirect()->route("home");
    }
}

?>