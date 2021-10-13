<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 05/03/2021
 * @ Website    : http://EasyToYou.eu
 */
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
namespace App\Providers;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = ["Illuminate\\Auth\\Events\\Registered" => ["Illuminate\\Auth\\Listeners\\SendEmailVerificationNotification"]];
    public function boot()
    {
        parent::boot();
    }
}

?>