<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class UsingProxy
{
    public function handle($request, \Closure $next)
    {
        if (setting_item("proxy_using") && usingProxy()) {
            return response("No Permissions .", 503)->header("Content-Type", "text/plain");
        }
        return $next($request);
    }
}

?>