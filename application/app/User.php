<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App;

class User extends \Illuminate\Foundation\Auth\User
{
    use \Illuminate\Notifications\Notifiable;
    protected $casts = ["name", "email", "password"];
}

?>