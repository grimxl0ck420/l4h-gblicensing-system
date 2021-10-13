<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Middleware;

class apichecker
{
    public function handle($request, \Closure $next)
    {
        $api_key = $request->api_key;
        if (!setting_item_value($api_key)) {
            return response()->json(["status" => "error", "message" => "Invalid Api Token"]);
        }
        return $next($request);
    }
}

?>