<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class Authenticate extends \Illuminate\Auth\Middleware\Authenticate
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route("login");
        }
    }
}

?>