<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Exceptions;

class Handler extends \Illuminate\Foundation\Exceptions\Handler
{
    protected $dontFlash = [];
    public function report(\Exception $exception)
    {
        $this::report($exception);
    }
    public function render($request, \Exception $exception)
    {
        return $this::render($request, $exception);
    }
}

?>