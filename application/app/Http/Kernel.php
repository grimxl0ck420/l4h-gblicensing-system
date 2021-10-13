<?php
namespace App\Http;

class Kernel extends \Illuminate\Foundation\Http\Kernel
{
	protected $middleware = ['App\\Http\\Middleware\\TrustProxies', 'App\\Http\\Middleware\\CheckForMaintenanceMode', 'Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize', 'App\\Http\\Middleware\\TrimStrings', 'Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull', 'App\\Http\\Middleware\\WhiteListMiddleware', 'App\\Http\\Middleware\\BlackListMiddleware', 'App\\Http\\Middleware\\UsingProxy'];
	protected $middlewareGroups = [
		'web' => ['App\\Http\\Middleware\\EncryptCookies', 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse', 'Illuminate\\Session\\Middleware\\StartSession', 'Illuminate\\View\\Middleware\\ShareErrorsFromSession', 'App\\Http\\Middleware\\VerifyCsrfToken', 'Illuminate\\Routing\\Middleware\\SubstituteBindings'],
		'api' => ['throttle:60,1', 'bindings']
	];
	protected $routeMiddleware = ['auth' => 'App\\Http\\Middleware\\Authenticate', 'auth.basic' => 'Illuminate\\Auth\\Middleware\\AuthenticateWithBasicAuth', 'bindings' => 'Illuminate\\Routing\\Middleware\\SubstituteBindings', 'cache.headers' => 'Illuminate\\Http\\Middleware\\SetCacheHeaders', 'can' => 'Illuminate\\Auth\\Middleware\\Authorize', 'guest' => 'App\\Http\\Middleware\\RedirectIfAuthenticated', 'signed' => 'Illuminate\\Routing\\Middleware\\ValidateSignature', 'throttle' => 'Illuminate\\Routing\\Middleware\\ThrottleRequests', 'verified' => 'Illuminate\\Auth\\Middleware\\EnsureEmailIsVerified', 'logined' => 'App\\Http\\Middleware\\checkRregister', 'notLogined' => 'App\\Http\\Middleware\\notLogined', 'checkLicense' => 'App\\Http\\Middleware\\checkLicense', 'checkReseller' => 'App\\Http\\Middleware\\checkReseller', 'checkResellerLicense' => 'App\\Http\\Middleware\\checkResellerLicense', 'globalReseller' => 'App\\Http\\Middleware\\globalReseller', 'apichecker' => 'App\\Http\\Middleware\\apichecker', 'checkWhmcs' => 'App\\Http\\Middleware\\checkWhmcs'];
	protected $middlewarePriority = ['Illuminate\\Session\\Middleware\\StartSession', 'Illuminate\\View\\Middleware\\ShareErrorsFromSession', 'App\\Http\\Middleware\\Authenticate', 'Illuminate\\Session\\Middleware\\AuthenticateSession', 'Illuminate\\Routing\\Middleware\\SubstituteBindings', 'Illuminate\\Auth\\Middleware\\Authorize'];
}

?>