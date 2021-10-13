<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

Artisan::command(
    "inspire", function () {
        $this->comment(Illuminate\Foundation\Inspiring::quote());
    }
)->describe("Display an inspiring quote");

?>