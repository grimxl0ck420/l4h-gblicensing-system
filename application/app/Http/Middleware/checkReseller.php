<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class checkReseller
{
    public function handle($request, \Closure $next)
    {
        $token = $request->token;
        $reseller = \App\Reseller::where("token", $token)->first();
        if ($reseller) {
            $expire_time = strtotime($reseller->end_at);
            if ($expire_time < time() || !$reseller->status) {
                return response()->json(["status" => "error", "message" => "Expired Token"]);
            }
            return $next($request);
        }
        return response()->json(["status" => "error", "message" => "Invalid token"]);
    }
}

?>