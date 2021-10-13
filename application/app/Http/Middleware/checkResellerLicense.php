<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class checkResellerLicense
{
    public function handle($request, \Closure $next)
    {
        $token = $request->token;
        $ip = $request->ip;
        $reseller = \App\Reseller::where("token", $token)->first();
        if ($reseller) {
            $expire_time = strtotime($reseller->end_at);
            if ($expire_time < time() || !$reseller->status) {
                return response()->json(["status" => "error", "message" => "Expired Token"]);
            }
            $license_key = $request->key;
            $software = \App\Software::where("key", $license_key)->first();
            if ($software) {
                if ($license_key != "whmcs") {
                    $license = \App\License::where("ip", $ip)->where("software_id", $software->id)->where("reseller_id", $reseller->id)->first();
                } else {
                    $license = \App\License::where("ip", $ip)->where("domain", $request->domain)->where("software_id", $software->id)->where("reseller_id", $reseller->id)->first();
                }
                if (!$license) {
                    return response()->json(["status" => "error", "message" => "Invalid Permission"]);
                }
                return $next($request);
            }
            return response()->json(["status" => "error", "message" => "Unknown Software"]);
        }
        return response()->json(["status" => "error", "message" => "Invalid token"]);
    }
}

?>