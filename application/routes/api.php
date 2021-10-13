<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

Route::middleware("auth:api")->get(
    "/user", function (Illuminate\Http\Request $request) {
        return $request->user();
    }
);

?>