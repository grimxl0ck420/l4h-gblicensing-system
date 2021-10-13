<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class TrimStrings extends \Illuminate\Foundation\Http\Middleware\TrimStrings
{
    protected $except = ["password", "password_confirmation"];
}

?>