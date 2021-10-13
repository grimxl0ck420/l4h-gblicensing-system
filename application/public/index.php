<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

define("LARAVEL_START", microtime(true));
require __DIR__ . "/../vendor/autoload.php";
$app = (require_once __DIR__ . "/../bootstrap/app.php");
$kernel = $app->make("Illuminate\\Contracts\\Http\\Kernel");
$response = $kernel->handle($request = Illuminate\Http\Request::capture());
$response->send();
$kernel->terminate($request, $response);

?>