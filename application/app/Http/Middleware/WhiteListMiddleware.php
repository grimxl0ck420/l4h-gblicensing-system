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

class WhiteListMiddleware
{
	public function handle($request, \Closure $next)
	{
		$ip = getip();
		$license_key = $request->key;
		$whitelist_status = false;
		$whitelist = \App\WhiteList::where('status', 1)->get();

		foreach ($whitelist as $one_ip) {
			if (preg_match('/' . $one_ip->ip . '/', $ip)) {
				$whitelist_status = true;
				break;
			}
		}

		if ($license_key) {
			if (0 < \App\Software::where('key', $license_key)->count()) {
				$software = \App\Software::where('key', $license_key)->first();

				if (0 < \App\License::where('ip', $ip)->where('software_id', $software->id)->count()) {
					$licenses = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
				}
				else {
					$licenses = NULL;
				}
			}
			else {
				$licenses = NULL;
			}
		}
		else {
			$licenses = NULL;
		}

		if (setting_item('IP_whitelist')) {
			if ($whitelist_status || $licenses) {
				return $next($request);
			}

			return response('No Permissions .', 503)->header('Content-Type', 'text/plain');
		}

		return $next($request);
	}
}

?>