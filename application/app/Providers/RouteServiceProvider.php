<?php
/**
 * @ This file is created by http://DeZender.Net
 * @ deZender (PHP7 Decoder for ionCube Encoder)
 *
 * @ Version            :    4.1.0.1
 * @ Author            :    DeZender
 * @ Release on        :    29.08.2020
 * @ Official site    :    http://DeZender.Net
 */

namespace app\providers;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    protected $namespace = 'App\\Http\\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        \Illuminate\Support\Facades\Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        \Illuminate\Support\Facades\Route::prefix('api')->middleware('api')->namespace($this->namespace)->group(base_path('routes/api.php'));
    }
}

?>