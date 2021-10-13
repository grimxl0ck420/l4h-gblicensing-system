<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class checkWhmcs
{
    public function handle($request, \Closure $next)
    {
        $ip = $request->ip;
        $license_key = "whmcs";
        $software = \App\Software::where("key", $license_key)->where("status", 1)->first();
        if ($software) {
            $license = \App\License::where("ip", $ip)->where("software_id", $software->id)->first();
            if ($license) {
                $expire_time = strtotime($license->end_at);
                if (!$license->status) {
                    return response("Disabled License", 403)->header("Content-Type", "text/plain");
                }
                if ($expire_time < time()) {
                    return response("Expired License", 403)->header("Content-Type", "text/plain");
                }
                return $next($request);
            }
            return response("Unknow Ip", 403)->header("Content-Type", "text/plain");
        }
        return response("Unknow Software", 403)->header("Content-Type", "text/plain");
    }
}

?>