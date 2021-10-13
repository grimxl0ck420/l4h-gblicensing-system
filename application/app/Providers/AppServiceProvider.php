<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Providers;

class AppServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
    }
    public function boot()
    {
        \URL::forceRootUrl(\Config::get("app.url"));
    }
}

?>