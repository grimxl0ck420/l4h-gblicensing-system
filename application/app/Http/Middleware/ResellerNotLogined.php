<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class ResellerNotLogined
{
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }
}

?>