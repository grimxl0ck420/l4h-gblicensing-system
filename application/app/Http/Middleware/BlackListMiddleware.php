<?php
/**
*
* @ This file is created by http://DeZender.Net
* @ deZender (PHP7 Decoder for ionCube Encoder)
*
* @ Version			:	4.1.0.1
* @ Author			:	DeZender
* @ Release on		:	29.08.2020
* @ Official site	:	http://DeZender.Net
*
*/

namespace App\Http\Middleware;

class BlackListMiddleware
{
	public function handle($request, \Closure $next)
	{
		$ip = getip();
		$blacklist_status = false;
		$blacklist = \App\BlackList::where('status', 1)->get();

		foreach ($blacklist as $one_ip) {
			if (preg_match('/' . $one_ip->ip . '/', $ip)) {
				$blacklist_status = true;
				break;
			}
		}

		if ($blacklist_status) {
			return response('No Permissions .', 503)->header('Content-Type', 'text/plain');
		}

		return $next($request);
	}
}

?>