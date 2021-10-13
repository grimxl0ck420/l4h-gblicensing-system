<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class TrustProxies extends \Fideloper\Proxy\TrustProxies
{
    protected $headers = null;
}

?>