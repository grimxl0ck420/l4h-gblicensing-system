<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

Broadcast::channel(
    "App.User.{id}", function ($user, $id) {
        return (array) $user->id === (array) $id;
    }
);

?>