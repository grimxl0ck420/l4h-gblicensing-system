<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Console;

class Kernel extends \Illuminate\Foundation\Console\Kernel
{
    protected $commands = ["App\\Console\\Commands\\UpdateServer"];
    protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
    {
        $schedule->command("update:server")->everyMinute();
    }
    protected function commands()
    {
        $this->load(__DIR__ . "/Commands");
        include base_path("routes/console.php");
    }
}

?>