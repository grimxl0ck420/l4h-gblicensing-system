<?php
namespace App\Http\Controllers;

class ApiController extends Controller
{
	public function virtualizor(\Illuminate\Http\Request $request)
	{
		if ($request->key == 'virtualizor') {
			$ip = getip();
			$license_key = $request->key;
			$server_range = intval($request->server_range);
			$software = \App\Software::where('key', $license_key)->first();
			$license_data = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
			$expire_date = date('Ymd', strtotime($license_data->end_at));
			$expire = date('d/m/Y', strtotime($license_data->end_at));
			$txt = '{' . "\r\n" . '            "license": "23333-23333-23333-23333-23333",' . "\r\n" . '            "lictype": "-1",' . "\r\n" . '            "lictype_txt": "Unlimited",' . "\r\n" . '            "active": 1,' . "\r\n" . '            "active_txt": "<font color=\\"green\\">Active<\\/font>",' . "\r\n" . '            "licnumvs": "0",' . "\r\n" . '            "primary_ip": "' . $_SERVER['REMOTE_ADDR'] . '",' . "\r\n" . '            "licexpires": "' . $expire_date . '",' . "\r\n" . '            "licexpires_txt": "' . $expire . ' GMT",' . "\r\n" . '            "last_edit": "0",' . "\r\n" . '            "fast_mirrors": ["https:\\/\\/mirror.license.ms", "https:\\/\\/mirror.license.ms", "https:\\/\\/mirror.license.ms", "https:\\/\\/mirror.license.ms", "https:\\/\\/mirror.license.ms"]' . "\r\n" . '}';
			$from = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')'];
			$to = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
			$txt = base64_encode($txt);
			$txt = str_replace($to, $from, $txt);
			$txt = gzcompress($txt);

			for ($i = 0; $i < strlen($txt); $i++) {
				$txt[$i] = sm_reverse_bits($txt[$i]);
			}

			$txt = base64_encode($txt);
			echo $txt;
			exit();
			$license = '<?php' . "\r\n" . '    //////////////////////////////////////////////////////////////' . "\r\n" . '    //===========================================================' . "\r\n" . '    // license.php' . "\r\n" . '    //===========================================================' . "\r\n" . '    // SOFTACULOUS' . "\r\n" . '    // Version : 1.0' . "\r\n" . '    // Inspired by the DESIRE to be the BEST OF ALL' . "\r\n" . '    // ----------------------------------------------------------' . "\r\n" . '    // Started by: Alons' . "\r\n" . '    // Date:       10th Jan 2009' . "\r\n" . '    // Time:       21:00 hrs' . "\r\n" . '    // Site:       http://www.softaculous.com/ (SOFTACULOUS)' . "\r\n" . '    // ----------------------------------------------------------' . "\r\n" . '    // Please Read the Terms of use at http://www.softaculous.com' . "\r\n" . '    // ----------------------------------------------------------' . "\r\n" . '    //===========================================================' . "\r\n" . '    // (c)Softaculous Inc.' . "\r\n" . '    //===========================================================' . "\r\n" . '    //////////////////////////////////////////////////////////////' . "\r\n" . '    ' . "\r\n" . '    if(!defined(\'SOFTACULOUS\')){' . "\r\n" . '    ' . "\r\n" . '            die(\'Hacking Attempt\');' . "\r\n" . '    ' . "\r\n" . '    }' . "\r\n" . '    $globals[\'license\'] = \'90124-87655-73343-18922-84229\';' . "\r\n" . '    $globals[\'lictype\'] = 1;//Type -1, 0 or 1' . "\r\n" . '    $globals[\'lictype_txt\'] = \'Premium\';' . "\r\n" . '    $globals[\'active\'] = 1;' . "\r\n" . '    $globals[\'active_txt\'] = \'<font>Active</font>\';' . "\r\n" . '    $globals[\'licnumvs\'] = 0;// 0 for unlimited' . "\r\n" . '    $globals[\'primary_ip\'] = \'' . $_SERVER['REMOTE_ADDR'] . ('\';//Primary IP' . "\r\n" . '    $globals[\'licexpires\'] = \'' . $expire_date . '\';//Expiry Date' . "\r\n" . '    $globals[\'licexpires_txt\'] = \'' . $expire . ' GMT\';' . "\r\n" . '    $globals[\'fast_mirrors\'][] = \'https://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '    $globals[\'fast_mirrors\'][] = \'http://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '    $globals[\'fast_mirrors\'][] = \'https://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '    $globals[\'fast_mirrors\'][] = \'http://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '    ' . "\r\n" . '    ?>');
			$license = @trim(@soft_decode($license));

			if (substr($license, 0, 5) == '<?php') {
				$license = substr($license, 5);
			}

			if (substr($license, -2) == '?>') {
				$license = substr($license, 0, strlen($license) - 2);
			}

			echo $license;
		}
	}

	public function softaculous(\Illuminate\Http\Request $request)
	{
		if ($request->key == 'softaculous') {
			$ip = getip();
			$license_key = $request->key;
			$server_range = intval($request->server_range);
			$software = \App\Software::where('key', $license_key)->first();
			$license_data = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
			$expire_date = date('Ymd', strtotime($license_data->end_at));
			$license = '<?php' . "\r\n" . '        //////////////////////////////////////////////////////////////' . "\r\n" . '        //===========================================================' . "\r\n" . '        // license.php' . "\r\n" . '        //===========================================================' . "\r\n" . '        // SOFTACULOUS' . "\r\n" . '        // Version : 1.0' . "\r\n" . '        // Inspired by the DESIRE to be the BEST OF ALL' . "\r\n" . '        // ----------------------------------------------------------' . "\r\n" . '        // Started by: Alons' . "\r\n" . '        // Date:       10th Jan 2009' . "\r\n" . '        // Time:       21:00 hrs' . "\r\n" . '        // Site:       http://www.softaculous.com/ (SOFTACULOUS)' . "\r\n" . '        // ----------------------------------------------------------' . "\r\n" . '        // Please Read the Terms of use at http://www.softaculous.com' . "\r\n" . '        // ----------------------------------------------------------' . "\r\n" . '        //===========================================================' . "\r\n" . '        // (c)Softaculous Inc.' . "\r\n" . '        //===========================================================' . "\r\n" . '        //////////////////////////////////////////////////////////////' . "\r\n" . '        ' . "\r\n" . '        if(!defined(\'SOFTACULOUS\')){' . "\r\n" . '        ' . "\r\n" . '                die(\'Hacking Attempt\');' . "\r\n" . '        ' . "\r\n" . '        }' . "\r\n" . '        ' . "\r\n" . '        $globals[\'license\'] = \'13885-34061-45642-27236-65621\';' . "\r\n" . '        $globals[\'lictype\'] = 1;//Type 0 or 1' . "\r\n" . '        $globals[\'num_users\'] = 0;' . "\r\n" . '        $globals[\'prod\'] = 0;' . "\r\n" . '        $globals[\'primary_ip\'] = \'' . $_SERVER['REMOTE_ADDR'] . ('\';//Primary IP' . "\r\n" . '        $globals[\'licexpires\'] = \'' . $expire_date . '\';//Expiry Date' . "\r\n" . '        $globals[\'fast_mirrors\'][] = \'https://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '        $globals[\'fast_mirrors\'][] = \'https://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '        $globals[\'fast_mirrors\'][] = \'https://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '        $globals[\'fast_mirrors\'][] = \'https://mirror.license.ms/\';//Fast Mirrors' . "\r\n" . '        $globals[\'last_edit\'] = \'TimeNow\';//Last Edit Time' . "\r\n" . '        ?>');
			$license = @trim(@soft_decode($license));

			if (substr($license, 0, 5) == '<?php') {
				$license = substr($license, 5);
			}

			if (substr($license, -2) == '?>') {
				$license = substr($license, 0, strlen($license) - 2);
			}

			echo $license;
		}
	}

	public function get_proxy(\Illuminate\Http\Request $request)
	{
		for ($ofi = 1; $ofi <= 40; $ofi++) {
			$full_path = base_path() . '/proxy.txt';
			$proxies = preg_split('/\\r\\n|\\r|\\n/', file_get_contents($full_path));
			$rand = rand(0, count($proxies));
			$back_end_type = env('back_end_type');
			$back_end_ip = env('back_end_ip');
			$back_end_port = env('back_end_port');
			$back_end_username = env('back_end_username');
			$back_end_password = env('back_end_password');
			$proxy = $proxies[$rand];
			$ip = explode(':', $proxy)[0];
			$port = explode(':', $proxy)[1];
			$username = explode(':', $proxy)[2];
			$password = explode(':', $proxy)[3];
			$status = json_decode(file_get_contents('https://verify.cpanel.net/api/verifyfeed?json=1&ip=' . $ip));

			if (is_object($status)) {
				if (isset($status->license[0]->attributes)) {
					if (($status->license[0]->attributes[0]->package == '15-DAY-TEST') && ($status->license[0]->attributes[0]->valid == '1') && ($status->license[0]->attributes[0]->status == '1')) {
						echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 ' . $ip . ' ' . $port . ' ' . $username . ' ' . $password);
						$ofi = 40;
					}
				}
			}
		}
	}

	public function change2(\Illuminate\Http\Request $request)
	{
		$this->get_proxy($request);
		exit();
		echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 173.211.90.18 4633 rC8Haq3975 xonhost645');
		return '';
		$full_path = base_path() . '/proxyrackList.txt';
		$proxies = preg_split('/\\r\\n|\\r|\\n/', file_get_contents($full_path));
		$rand = rand(0, 4);
		$proxy = $proxies[$rand];
		$ip = explode(':', $proxy)[0];
		$port = explode(':', $proxy)[1];
		$username = explode(':', $proxy)[2];
		$password = explode(':', $proxy)[3];
		echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 ' . $ip . ' ' . $port . ' ' . $username . ' ' . $password);
	}

	public function change3(\Illuminate\Http\Request $request)
	{
		$this->get_proxy($request);
		exit();
		$full_path = base_path() . '/proxyrackList1.txt';
		$proxies = preg_split('/\\r\\n|\\r|\\n/', file_get_contents($full_path));
		$rand = rand(0, 4);
		$proxy = $proxies[$rand];
		$ip = explode(':', $proxy)[0];
		$port = explode(':', $proxy)[1];
		$username = explode(':', $proxy)[2];
		$password = explode(':', $proxy)[3];
		echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 ' . $ip . ' ' . $port . ' ' . $username . ' ' . $password);
	}

	public function change(\Illuminate\Http\Request $request)
	{
		$this->get_proxy($request);
		exit();
		exec('sudo killall -HUP tor');

		for ($ofi = 1; $ofi <= 40; $ofi++) {
			$proxy = '127.0.0.1:9050';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_URL, 'https://api.proxyscrape.com/?request=getproxies&proxytype=socks5&timeout=3000&country=all');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$f = curl_exec($ch);
			curl_close($ch);
			$ex = explode("\n", $f);
			$ac = count($ex);
			$rnd = rand(1, count($ex) - 1);

			if (10 < count($ex)) {
				preg_match('/\\b\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\b\\:[0-9]{1,5}/', $ex[$rnd], $matches);
				$exnxx = explode(':', $matches[0]);
				$gt = file_get_contents('https://verify.cpanel.net/app/verify?ip=' . $exnxx[0]);
				$status = json_decode(file_get_contents('https://verify.cpanel.net/api/verifyfeed?json=1&ip=' . $exnxx[0]));

				if (strpos($gt, 'Results: Not licensed') !== false) {
					echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 ' . $exnxx[0] . ' ' . $exnxx[1]);
					$ofi = 40;
					continue;
				}

				if (is_object($status)) {
					if (isset($status->license[0]->attributes)) {
						if (($status->license[0]->attributes[0]->package == '15-DAY-TEST') && ($status->license[0]->attributes[0]->valid == '1') && ($status->license[0]->attributes[0]->status == '1')) {
							echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 ' . $exnxx[0] . ' ' . $exnxx[1]);
							$ofi = 40;
						}
					}
				}
			}
		}
	}

	public function change1(\Illuminate\Http\Request $request)
	{
		$this->get_proxy($request);
		exit();
		exec('sudo killall -HUP tor');

		for ($ofi = 1; $ofi <= 40; $ofi++) {
			$proxy = '127.0.0.1:9050';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_URL, 'https://api.proxyscrape.com/?request=getproxies&proxytype=socks4&timeout=10000&country=all');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$f = curl_exec($ch);
			curl_close($ch);
			$ex = explode("\n", $f);
			$ac = count($ex);
			$rnd = rand(1, count($ex) - 1);

			if (10 < count($ex)) {
				preg_match('/\\b\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\b\\:[0-9]{1,5}/', $ex[$rnd], $matches);
				$exnxx = explode(':', $matches[0]);
				$gt = file_get_contents('https://verify.cpanel.net/app/verify?ip=' . $exnxx[0]);
				$status = json_decode(file_get_contents('https://verify.cpanel.net/api/verifyfeed?json=1&ip=' . $exnxx[0]));

				if (strpos($gt, 'Results: Not licensed') !== false) {
					echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks4 ' . $exnxx[0] . ' ' . $exnxx[1]);
					$ofi = 40;
					continue;
				}

				if (is_object($status)) {
					if (isset($status->license[0]->attributes)) {
						if (($status->license[0]->attributes[0]->package == '15-DAY-TEST') && ($status->license[0]->attributes[0]->valid == '1') && ($status->license[0]->attributes[0]->status == '1')) {
							echo nl2br('dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . 'socks5 ' . $exnxx[0] . ' ' . $exnxx[1]);
							$ofi = 40;
						}
					}
				}
			}
		}
	}

	public function getLicenseHash($key, \Illuminate\Http\Request $request)
	{
		$public = config('publicKey.public');
		$ip = getip();
		$license_key = $key;
		$software = \App\Software::where('key', $license_key)->first();
		$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
		$dataArr = ['second' => strtotime($license->end_at)];
		openssl_public_encrypt(json_encode($dataArr), $encrypted, $public);
		$data = ['status' => 'success', 'sig' => base64_encode($encrypted)];
		return response()->json($data);
	}

	public function whmcs(\Illuminate\Http\Request $request)
	{
		$ip = $request->ip;
		$license_key = $request->license_key;
		$license = \App\License::where('license_key', $license_key)->where('status', 1)->where('ip', $ip)->where('end_at', '>=', date('Y-m-d'))->first();

		if ($license) {
			$billingcycle = '1';

			if ($license->{$billingcycle} == 'Monthly') {
				$billingcycle = '1';
			}
			else if ($license->{$billingcycle} == 'Quarterly') {
				$billingcycle = '3';
			}
			else if ($license->{$billingcycle} == 'Semi-Annually') {
				$billingcycle = '6';
			}
			else if ($license->{$billingcycle} == 'Annually') {
				$billingcycle = '12';
			}

			$hash = sha1('WHMCSV5.2SYH' . $request->check_token);
			$validdirs = ($request->dir ? $request->dir : $license->validdirs);
			$results = register_whmcs_license($license_key, $license->domain, $license->ip, $validdirs, $billingcycle, $license->end_at, $request->version);
			$full_data = ['hash' => $hash, 'new' => $results];
			$full_data = json_encode($full_data);
			$full_data = base64_encode($full_data);
			$full_data = strrev($full_data);
			$signature = sign_hash($full_data);
			$license->validdirs = $validdirs;
			$license->save();
			return response($full_data . ':' . $signature, 200)->header('Content-Type', 'text/plain');
		}
		else {
			return response('Invalid Whmcs License', 403)->header('Content-Type', 'text/plain');
		}
	}

	public function getbuyers()
	{
		$buyer = \App\Buyer::select('code', 'domain')->where('status', 1)->get();
		return response()->json($buyer);
	}

	public function getsoftwares()
	{
		$softwares = \App\Software::select('key', 'id', 'name')->where('key', '!=', 'whmcs')->where('status', 1)->get();
		return response()->json($softwares);
	}

	public function verifyLicense(\Illuminate\Http\Request $request)
	{
		$ip = $request->ip;
		$license_key = $request->key;
		$software = \App\Software::where('key', $license_key)->where('status', 1)->first();

		if ($software) {
			$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();

			if ($license) {
				$expire_time = strtotime($license->end_at);
				if ($license->status && !($expire_time < time())) {
					return response('Active', 200)->header('Content-Type', 'text/plain');
				}
				else {
					return response('Disabled', 403)->header('Content-Type', 'text/plain');
				}
			}
			else {
				return response('Disabled', 403)->header('Content-Type', 'text/plain');
			}
		}
		else {
			return response('Disabled', 403)->header('Content-Type', 'text/plain');
		}
	}

	public function addBalance(\Illuminate\Http\Request $request)
	{
		$api_key = $request->api_key;
		$addBalance = floatval($request->balance);
		$token = $request->token;
		$reseller = \App\Reseller::where('token', $token)->first();

		if ($reseller) {
			$reseller->balance = $reseller->balance + $addBalance;
			$reseller->save();
			return response()->json(['status' => 'success', 'message' => 'Balance updated Sucessfully']);
		}
		else {
			return response()->json(['status' => 'error', 'message' => 'Reseller token doesn\'t exists ']);
		}
	}

	public function deleteReseller(\Illuminate\Http\Request $request)
	{
		$reseller_token = $request->reseller_token;
		$reseller = \App\Reseller::where('token', $reseller_token)->first();

		if ($reseller) {
			\App\Reseller::where('token', $reseller_token)->delete();
			return response()->json(['status' => 'success', 'message' => 'The Reseller deleted successfully']);
		}

		return response()->json(['status' => 'error', 'message' => 'The Reseller token does not exists']);
	}

	public function getplans(\Illuminate\Http\Request $request)
	{
		$levels = \App\LevelReseller::select('title', 'id')->get();
		return response()->json(['status' => true, 'plans' => $levels]);
	}

	public function getResellerInfo(\Illuminate\Http\Request $request)
	{
		$reseller_token = $request->reseller_token;
		$reseller = \App\Reseller::where('token', $request->reseller_token)->get();

		if (0 < \App\Reseller::where('token', $request->reseller_token)->count()) {
			$status = ($reseller->status ? 'Active' : 'Deactivated');
			return response()->json(['status' => $status, 'token' => $reseller->token]);
		}

		return response()->json(['status' => 'Deactivated', 'token' => '']);
	}

	public function deactivateReseller(\Illuminate\Http\Request $request)
	{
		$reseller_token = $request->reseller_token;
		$reseller = \App\Reseller::where('token', $reseller_token)->first();

		if ($reseller) {
			$reseller->status = 0;
			$reseller->save();
			return response()->json(['status' => 'success', 'message' => 'The Reseller token updated successfully']);
		}

		return response()->json(['status' => 'error', 'message' => 'The Reseller token does not exists']);
	}

	public function activateReseller(\Illuminate\Http\Request $request)
	{
		$reseller_token = $request->reseller_token;
		$reseller = \App\Reseller::where('token', $reseller_token)->first();

		if ($reseller) {
			$reseller->status = 1;
			$reseller->save();
			return response()->json(['status' => 'success', 'message' => 'The Reseller token updated successfully']);
		}

		return response()->json(['status' => 'error', 'message' => 'The Reseller token does not exists']);
	}

	public function registerReseller(\Illuminate\Http\Request $request)
	{
		$month = (0 < intval($request->month) ? intval($request->month) : 1);
		$reseller_token = $request->reseller_token;
		$status = true;
		$message = '';

		if ($reseller_token == NULL) {
			$rules = ['brand_name' => 'required', 'subdomain' => 'required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*$/', 'main_domain' => 'required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*$/', 'folder' => 'required', 'key_cmd' => 'required'];
			$validator = \Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				$message = $validator->errors()->all();
				$message = $message[0];
				$status = false;
			}
		}

		if (!empty($request->level)) {
			if (!\App\LevelReseller::find($request->level)) {
				$status = false;
				$message = 'Invalid Reseller Level';
			}
		}

		$token = md5(time() . '-' . \uniqid() . '-' . time());

		if ($reseller_token == NULL) {
			$reseller = new \App\Reseller();
		}
		else if (0 < \App\Reseller::where('token', $request->reseller_token)->count()) {
			$reseller = \App\Reseller::where('token', $request->reseller_token)->first();
			$token = $reseller_token;
		}
		else {
			$status = false;
		}

		if ($status) {
			$reseller->name = ($request->brand_name ? $request->brand_name : $reseller->name);
			$reseller->token = $token;
			$reseller->domain = ($request->subdomain ? $request->subdomain : $reseller->domain);
			$reseller->balance = ($reseller->balance ? $reseller->balance : 0);
			$reseller->end_at = date('Y-m-d', strtotime('+' . $month . ' month'));
			$reseller->type = 'whmcs';
			$reseller->client_id = $request->clientId;
			$reseller->main_domain = ($request->main_domain ? $request->main_domain : $reseller->main_domain);
			$reseller->level_id = ($request->level ? $request->level : $reseller->level_id);
			$reseller->folder = ($request->folder ? $request->folder : $reseller->folder);
			$reseller->key_cmd = ($request->key_cmd ? $request->key_cmd : $reseller->key_cmd);
			$reseller->status = 1;
			$reseller->save();
		}
		else {
			$token = '';
		}

		return response()->json(['status' => $status ? 'success' : 'error', 'message' => $message, 'token' => $token]);
	}

	public function getInfo(\Illuminate\Http\Request $request)
	{
		$ip = getip();
		$license_key = $request->key;
		$software = \App\Software::where('key', $license_key)->first();

		if ($license_key == 'whmcs') {
			$license = \App\License::where('domain', $request->domain)->where('ip', $request->ip)->where('software_id', $software->id)->first();
			$reseller = \App\Reseller::find($license->reseller_id);

			if ($reseller) {
				return response()->json(['status' => 'success', 'brand_name' => $reseller->name, 'domain_name' => $reseller->main_domain, 'key_cmd' => $reseller->key_cmd, 'expire_date' => date('Y-m-d', strtotime($license->end_at))]);
			}
			else {
				return response()->json(['status' => 'success', 'brand_name' => '', 'domain_name' => '', 'key_cmd' => '', 'expire_date' => date('Y-m-d', strtotime($license->end_at))]);
			}
		}
		else {
			$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
			$reseller = \App\Reseller::find($license->reseller_id);

			if ($reseller) {
				return response()->json(['status' => 'success', 'brand_name' => $reseller->name, 'domain_name' => $reseller->main_domain, 'key_cmd' => $reseller->key_cmd, 'expire_date' => date('Y-m-d', strtotime($license->end_at))]);
			}
			else {
				return response()->json(['status' => 'success', 'brand_name' => '', 'domain_name' => '', 'key_cmd' => '', 'expire_date' => date('Y-m-d', strtotime($license->end_at))]);
			}
		}
	}

	public function getServer(\Illuminate\Http\Request $request)
	{
		$key = $request->key;
		$virtual_server = \App\VirtualServer::where('server_key', $key)->first();

		if ($virtual_server) {
			return response($virtual_server->server_ip, 200)->header('Content-Type', 'text/plain');
		}
		else {
			return response('UnFound', 403)->header('Content-Type', 'text/plain');
		}
	}

	public function files(\Illuminate\Http\Request $request, $folder, $file)
	{
		$ip = $request->ip();
		$license_key = $request->key;
		$status = true;

		if ($folder != 'plast') {
			$license_key = $folder;

			if (\App\Software::where('key', $license_key)->first()) {
				$software = \App\Software::where('key', $license_key)->first();

				if (!\App\License::where('ip', $ip)->where('software_id', $software->id)->first()) {
					$status = false;
				}
			}
			else {
				$status = false;
			}
		}

		$files = explode('/', $file);
		$file = '';

		foreach ($files as $key => $one_file) {
			$file .= '/' . $one_file;
		}

		$full_path = base_path() . ('/../files/' . $folder . $file);
		$file_name = end($files);
		if (is_file($full_path) && $status) {
			return response()->download($full_path, $file_name);
		}
		else {
			return response('UnFound', 404)->header('Content-Type', 'text/plain');
		}
	}

	public function gbv2(\Illuminate\Http\Request $request, $folder, $file)
	{
		$ip = $request->ip();
		$license_key = $request->key;
		$status = true;

		if ($folder != 'plast') {
			$license_key = $folder;

			if (\App\Software::where('key', $license_key)->first()) {
				$software = \App\Software::where('key', $license_key)->first();

				if (!\App\License::where('ip', $ip)->where('software_id', $software->id)->first()) {
					$status = false;
				}
			}
			else {
				$status = false;
			}
		}

		$files = explode('/', $file);
		$file = '';

		foreach ($files as $key => $one_file) {
			$file .= '/' . $one_file;
		}

		$full_path = base_path() . ('/../filesv2/' . $folder . $file);
		$file_name = end($files);
		if (is_file($full_path) && $status) {
			return response()->download($full_path, $file_name);
		}
		else {
			return response('UnFound', 404)->header('Content-Type', 'text/plain');
		}
	}

	public function data(\Illuminate\Http\Request $request, $file)
	{
		$buyer_id = $request->id;
		$full_path = base_path() . ('/../data/' . $file);
		if (is_file($full_path) && \App\Buyer::where('code', $buyer_id)->where('status', 1)->count()) {
			return response()->download($full_path, $file);
		}
		else {
			return response('UnFound', 403)->header('Content-Type', 'text/plain');
		}
	}

	public function getBlanace(\Illuminate\Http\Request $request)
	{
		$token = $request->token;
		$reseller = \App\Reseller::where('token', $token)->first();

		if ($reseller->type == 'whmcs') {
			$balance = whmcs_get_balance($reseller->client_id);
		}
		else {
			$balance = $reseller->balance;
		}

		return response('$' . $balance, 200)->header('Content-Type', 'text/plain');
	}

	public function getlist(\Illuminate\Http\Request $request)
	{
		$token = $request->token;
		$reseller = \App\Reseller::where('token', $token)->first();
		$license_text = [];
		$licenses = \App\License::select('ip', 'end_at', 'software_id')->where('reseller_id', $reseller->id)->get();

		foreach ($licenses as $license) {
			$key = \App\Software::find($license->software_id)->key;
			$license_text[] = ['ip' => $license->ip, 'Expired date' => $license->end_at, 'key' => $key];
		}

		return response()->json(['status' => 'success', 'message' => '', 'data' => $license_text]);
	}

	public function getmsg(\Illuminate\Http\Request $request)
	{
		$token = $request->token;
		$message = \App\Message::first();
		return response()->json(['status' => 'success', 'message' => $message->message]);
	}

	public function getstatus(\Illuminate\Http\Request $request)
	{
		$token = $request->token;
		$reseller = \App\Reseller::where('token', $token)->first();
		$status = ($reseller->status ? 'Active' : 'Deactivated');
		return response()->json(['status' => 'success', 'message' => $status]);
	}

	public function getpackage(\Illuminate\Http\Request $request)
	{
		$token = $request->token;
		$reseller = \App\Reseller::where('token', $token)->first();
		$plan = 'default';

		if ($reseller->level_id) {
			$level = \App\LevelReseller::find($reseller->level_id);

			if ($level) {
				$plan = $level->title;
			}
		}

		$plan = ucfirst($plan);
		return response()->json(['status' => 'success', 'message' => $plan]);
	}

	public function deleteLicense(\Illuminate\Http\Request $request)
	{
		$license_key = $request->key;
		$ip = $request->ip;
		$token = $request->token;
		$software = \App\Software::where('key', $license_key)->firstorfail();
		$reseller = \App\Reseller::where('token', $token)->first();
		\App\License::where('ip', $ip)->where('software_id', $software->id)->delete();
		$softwares = json_decode($software->softwares, true);

		if (0 < count($softwares)) {
			foreach ($softwares as $onesoftware) {
				$software_checker = \App\Software::find($onesoftware);
				$license_check = \App\License::where('ip', $ip)->where('software_id', $onesoftware)->first();

				if ($license_check) {
					$license_check->delete();
				}
			}
		}

		return response()->json(['status' => 'success', 'message' => 'The license deleted successfully']);
	}

	public function getResellerLicenseInfo(\Illuminate\Http\Request $request)
	{
		$ip = $request->ip;
		$token = $request->token;
		$license_key = $request->key;
		$software1 = \App\Software::where('key', $license_key)->get()[0];
		$reseller = \App\Reseller::where('token', $token)->first();
		$license = \App\License::where('ip', $ip)->where('software_id', $software1->id)->first();
		$status = ($license->status ? 'Active' : 'Deactivated');
		$change_ip = ($license->change_ip ? 'Active' : 'Deactivated');
		$softwarekey = $software1->key;
		$cmd = '#' . $softwarekey . "\n";
		$cmd .= $software1->cmd;
		$cmd = str_replace('{domain}', $reseller->domain, $cmd);

		if ($reseller->folder) {
			$cmd = str_replace('{folder}', $reseller->folder, $cmd);
		}

		if (0 < count(json_decode($software1->softwares))) {
			foreach (json_decode($software1->softwares) as $soft) {
				$soft = \App\Software::find($soft);
				$softwarekey = $soft->key;
				$cmd .= "\n" . '#' . $softwarekey . "\n";
				$cmd .= $soft->cmd;
				$cmd = str_replace('{domain}', $reseller->domain, $cmd);

				if ($reseller->folder) {
					$cmd = str_replace('{folder}', $reseller->folder, $cmd);
				}
			}
		}

		return response()->json(['status' => 'success', 'expire_date' => date('Y-m-d', strtotime($license->end_at)), 'change_ip' => $change_ip, 'cmd' => $cmd, 'status' => $status]);
	}

	public function deactivateLicense(\Illuminate\Http\Request $request)
	{
		$license_key = $request->key;
		$ip = $request->ip;
		$token = $request->token;
		$software = \App\Software::where('key', $license_key)->firstorfail();
		$reseller = \App\Reseller::where('token', $token)->first();
		$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();

		if ($license) {
			$license->status = 0;
			$license->save();
			$softwares = json_decode($software->softwares, true);

			if (0 < count($softwares)) {
				foreach ($softwares as $onesoftware) {
					$software_checker = \App\Software::find($onesoftware);
					$license_check = \App\License::where('ip', $ip)->where('software_id', $onesoftware)->first();

					if ($license_check) {
						$license_check->status = 0;
						$license_check->save();
					}
				}
			}

			return response()->json(['status' => 'success', 'message' => 'The license updated successfully']);
		}

		return response()->json(['status' => 'error', 'message' => 'The license does not exists']);
	}

	public function activateLicense(\Illuminate\Http\Request $request)
	{
		$license_key = $request->key;
		$ip = $request->ip;
		$token = $request->token;
		$software = \App\Software::where('key', $license_key)->firstorfail();
		$reseller = \App\Reseller::where('token', $token)->first();
		$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();

		if ($license) {
			$license->status = 1;
			$license->save();
			$softwares = json_decode($software->softwares, true);

			if (0 < count($softwares)) {
				foreach ($softwares as $onesoftware) {
					$software_checker = \App\Software::find($onesoftware);
					$license_check = \App\License::where('ip', $ip)->where('software_id', $onesoftware)->first();

					if ($license_check) {
						$license_check->status = 1;
						$license_check->save();
					}
				}
			}

			return response()->json(['status' => 'success', 'message' => 'The license updated successfully']);
		}

		return response()->json(['status' => 'error', 'message' => 'The license does not exists']);
	}

	public function changeIpLicense(\Illuminate\Http\Request $request)
	{
		$license_key = $request->key;
		$ip = $request->ip;
		$ip_new = $request->ip_new;
		$token = $request->token;
		$software = \App\Software::where('key', $license_key)->firstorfail();
		$reseller = \App\Reseller::where('token', $token)->first();

		if ($license_key != 'whmcs') {
			$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
		}
		else {
			$license = \App\License::where('ip', $ip)->where('domain', $request->domain)->where('software_id', $software->id)->first();
		}

		if (is_ip($ip)) {
			if ($license) {
				if ($software->change_ip) {
					if ($license_key != 'whmcs') {
						$check_new_ip = \App\License::where('ip', $ip_new)->where('software_id', $software->id)->first();

						if ($check_new_ip) {
							$check_new_ip->reseller_id = $reseller->id;
							$check_new_ip->end_at = $license->end_at;
							$check_new_ip->save();
							$license->delete();
						}
						else {
							$license->ip = $ip_new;
							$license->save();
						}
					}
					else {
						$check_new_ip = \App\License::where('domain', $request->domain_new)->where('software_id', $software->id)->first();
						if ($check_new_ip && ($ip_new != $ip)) {
							$license_key = 'verify_whmcs';
							$check_new_ip->reseller_id = $reseller->id;
							$check_new_ip->end_at = $license->end_at;
							$check_new_ip->validdirs = str_replace(["\r\n", "\r"], ',', $request->validdir_new);
							$check_new_ip->license_key = $license->license_key;
							$check_new_ip->ip = $ip_new;
							$check_new_ip->save();
							$license->delete();
						}
						else {
							$license_key = 'verify_whmcs';
							$license->ip = $ip_new;
							$license->domain = $request->domain_new;
							$license->validdirs = str_replace(["\r\n", "\r"], ',', $request->validdir_new);
							$license->save();
						}
					}

					$softwares = json_decode($software->softwares, true);

					if (0 < count($softwares)) {
						foreach ($softwares as $onesoftware) {
							$software_checker = \App\Software::find($onesoftware);

							if ($software_checker->change_ip) {
								$license_check = \App\License::where('ip', $ip)->where('software_id', $onesoftware)->first();
								$software_one = \App\Software::find($onesoftware);

								if ($license_check) {
									$check_new_ip_add = \App\License::where('ip', $ip_new)->where('software_id', $onesoftware)->first();

									if ($check_new_ip_add) {
										$check_new_ip_add->reseller_id = $reseller->id;
										$check_new_ip_add->end_at = $license->end_at;
										$check_new_ip_add->save();
										$license_check->delete();
									}
									else {
										$license_check->ip = $ip_new;
										$license_check->save();
									}
								}
							}
						}
					}

					return response()->json(['status' => 'success', 'message' => 'The license updated successfully']);
				}
				else {
					return response()->json(['status' => 'error', 'message' => 'The license does not exists']);
				}
			}
			else {
				return response()->json(['status' => 'error', 'message' => 'Can\'t change ip']);
			}
		}
		else {
			return response()->json(['status' => 'error', 'message' => 'Invalid Ip Address']);
		}
	}

	public function registerLicense(\Illuminate\Http\Request $request)
	{
		$license_key = $request->key;
		$ip = $request->ip;
		$token = $request->token;
		$month = (0 < intval($request->month) ? intval($request->month) : 1);
		$software = \App\Software::where('key', $license_key)->firstorfail();
		$reseller = \App\Reseller::where('token', $token)->first();

		if ($reseller->level_id) {
			$level = \App\LevelReseller::find($reseller->level_id);

			if ($level) {
				$level_software = \App\LevelResellerOption::where('software_id', $software->id)->where('level_reseller_id', $level->id)->first();

				if ($level_software) {
					$price_reseller = $level_software->price_reseller;
				}
				else {
					$price_reseller = $software->price_reseller;
				}
			}
			else {
				$price_reseller = $software->price_reseller;
			}
		}
		else {
			$price_reseller = $software->price_reseller;
		}

		if (is_ip($ip)) {
			if ($reseller->type == 'whmcs') {
				$balance = whmcs_get_balance($reseller->client_id);
			}
			else {
				$balance = $reseller->balance;
			}

			if (($month * $price_reseller) <= $balance) {
				$status = true;

				if ($reseller->type != 'whmcs') {
					$reseller->balance = $balance - ($month * $price_reseller);
					$reseller->save();
				}
				else if (!whmcs_create_invoice($reseller->client_id, $software->id, $month * $price_reseller)) {
					$status = false;
				}

				if ($status) {
					$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
					$softwares = json_decode($software->softwares, true);

					if (0 < count($softwares)) {
						foreach ($softwares as $onesoftware) {
							$license_check = \App\License::where('ip', $ip)->where('software_id', $onesoftware)->first();
							$software_one = \App\Software::find($onesoftware);

							if (!$license_check) {
								$license_1 = \App\License::where('ip', $ip)->first();
								$license_1 = new \App\License();
								$license_1->ip = $request->ip;
								$license_1->end_at = date('Y-m-d', strtotime('+' . $month . ' month'));
								$license_1->software_id = $onesoftware;
								$license_1->reseller_id = $reseller->id;
								$license_1->status = 1;
								$license_1->save();
							}
							else {
								$license_check->end_at = date('Y-m-d', strtotime('+' . $month . ' month'));
								$license_check->reseller_id = $reseller->id;
								$license_check->save();
							}
						}
					}

					if (!$license) {
						$license_new = new \App\License();
						$license_new->ip = $request->ip;
						$license_new->end_at = date('Y-m-d', strtotime('+' . $month . ' month'));
						$license_new->status = 1;
						$license_new->software_id = $software->id;
						$license_new->reseller_id = $reseller->id;

						if ($license_key == 'whmcs') {
							$license_new->domain = $request->domain;
							$license_new->validdirs = str_replace(["\r\n", "\r"], ',', $request->validdir);
							$license_new->license_key = $request->licensekey;
							$billingcycle = 'Monthly';

							if ($month == 1) {
								$billingcycle = 'Monthly';
							}
							else if ($month == 3) {
								$billingcycle = 'Quarterly';
							}
							else if ($month == 6) {
								$billingcycle = 'Semi-Annually';
							}
							else if ($month == 12) {
								$billingcycle = 'Annually';
							}

							$license_new->billingcycle = $billingcycle;
						}

						$license_new->save();

						if ($license_key == 'whmcs') {
							$license_key_al = 'verify_whmcs';
						}
					}
					else {
						$license->end_at = date('Y-m-d', strtotime('+' . $month . ' month'));

						if ($license_key == 'whmcs') {
							$license->domain = $request->domain;
							$license->validdirs = str_replace(["\r\n", "\r"], ',', $request->validdir);
							$license->license_key = $request->licensekey;
							$billingcycle = 'Monthly';

							if ($month == 1) {
								$billingcycle = 'Monthly';
							}
							else if ($month == 3) {
								$billingcycle = 'Quarterly';
							}
							else if ($month == 6) {
								$billingcycle = 'Semi-Annually';
							}
							else if ($month == 12) {
								$billingcycle = 'Annually';
							}

							$license->billingcycle = $billingcycle;
							$license_key_al = 'verify_whmcs';
						}

						$license->reseller_id = $reseller->id;
						$license->save();
					}

					return response()->json(['status' => 'success', 'message' => 'The ip  registered  Sucessfully']);
				}
				else {
					return response()->json(['status' => 'error', 'message' => 'Invalid response from server']);
				}
			}
			else {
				return response()->json(['status' => 'error', 'message' => 'Balance is less than ' . ($price_reseller * $month)]);
			}
		}
		else {
			return response()->json(['status' => 'error', 'message' => 'Invalid Ip Address']);
		}
	}

	public function license(\Illuminate\Http\Request $request)
	{
		$ip = getip();
		$license_key = $request->key;
		$server_range = intval($request->server_range);
		$software = \App\Software::where('key', $license_key)->first();
		$license = \App\License::where('ip', $ip)->where('software_id', $software->id)->first();
		$servers = [];
		if ((($license_key != 'cpanel') && ($license_key != 'dcpanel') && ($license_key != 'imunify360') && ($license_key != 'cloudlinux') && ($license_key != 'litespeed')) || !env('Proxyrack', 'false')) {
			$ProxySoftware = \App\ProxySoftware::where('software_id', $software->id)->where('status', 1)->get();

			foreach ($ProxySoftware as $one_proxy) {
				$expiry_date_software = intval($one_proxy->expiry_date);
				$date_software = \Carbon\Carbon::parse($one_proxy->created_at);
				$now_software = \Carbon\Carbon::now();
				$diff_software = $date_software->diffInDays($now_software);
				$days_software = $expiry_date_software - $diff_software;
				$days_software = (string) $days_software;
				if (($diff_software < $expiry_date_software) && (($one_proxy->used < $one_proxy->use) || ($one_proxy->use == 0))) {
					$proxy = \App\Proxy::find($one_proxy->proxy_id);
					$port = $proxy->port;
					$ip = $proxy->ip;
					$type = $proxy->type;
					$expiry_date = intval($proxy->expiry_date);
					$date = \Carbon\Carbon::parse($proxy->created_at);
					$now = \Carbon\Carbon::now();
					$diff = $date->diffInDays($now);
					$days = $expiry_date - $diff;
					$days = (string) $days;
					if (($diff < $expiry_date) && $proxy->status) {
						$servers[] = ['proxy_conf' => generate_proxy($proxy->type, $proxy->ip, $proxy->port, $proxy->username, $proxy->password, $proxy->backend_type, $proxy->backend_ip, $proxy->backend_port), 'key' => $one_proxy->key, 'created_at' => $one_proxy->created_at, 'last_use' => $one_proxy->last_use, 'priority' => $one_proxy->priority, 'type' => 'proxy_software', 'id' => $one_proxy->id];
					}
				}
			}

			$servers_list = \App\Server::where('software_id', $software->id)->where('status', 1)->orderBy('priority', 'asc')->get();

			foreach ($servers_list as $server_list) {
				$expiry_date = intval($server_list->expiry_date);
				$date = \Carbon\Carbon::parse($server_list->created_at);
				$now = \Carbon\Carbon::now();
				$diff = $date->diffInDays($now);
				$days = $expiry_date - $diff;
				$days = (string) $days;
				if (($diff < $expiry_date) && (($server_list->used < $server_list->use) || ($server_list->use == 0))) {
					$servers[] = ['proxy_conf' => $server_list->proxy_conf, 'key' => $server_list->key, 'created_at' => $server_list->created_at, 'last_use' => $server_list->last_use, 'priority' => $server_list->priority, 'type' => 'server', 'id' => $server_list->id];
				}
			}
			usort($servers, function($a, $b) {
				if ($a['created_at'] == $b['created_at']) {
					return 0;
				}

				return $a['created_at'] < $b['created_at'] ? 1 : -1;
			});
			usort($servers, function($a, $b) {
				if ($a['priority'] == $b['priority']) {
					return 0;
				}

				return $a['priority'] < $b['priority'] ? 1 : -1;
			});

			if (setting_item('last_using')) {
				usort($servers, function($a, $b) {
					if ($a['last_use'] == $b['last_use']) {
						return 0;
					}

					$last_use_b = $b['created_at'];
					$last_use_a = $a['created_at'];

					if ($b['last_use']) {
						$last_use_b = $b['last_use'];
					}

					if ($a['last_use']) {
						$last_use_a = $a['last_use'];
					}

					return $last_use_b < $last_use_a ? 1 : -1;
				});
			}

			if ($server_range < count($servers)) {
				$server = array_slice($servers, $server_range, 1, true);

				if (is_array($server)) {
					$server = (object) $server[$server_range];

					if ($server) {
						$current_date = date('Y-m-d H:i:s');

						if ($server->type == 'server') {
							$server_insert = \App\Server::find($server->id);
							$server_insert->used = $server_insert->used + 1;
							$server_insert->last_use = $current_date;
							$server_insert->save();
						}
						else {
							$server_insert = \App\ProxySoftware::find($server->id);
							$server_insert->used = $server_insert->used + 1;
							$server_insert->last_use = $current_date;
							$server_insert->save();
						}

						return response()->json(['status' => 'success', 'proxy_conf' => $server->proxy_conf, 'key' => $server->key]);
					}
					else {
						return response()->json(['status' => 'error', 'proxy_conf' => '', 'key' => '']);
					}
				}
			}
			else {
				return response()->json(['status' => 'error', 'proxy_conf' => '', 'key' => '']);
			}
		}
		else if (($license_key == 'imunify360') || ($license_key == 'cloudlinux')) {
			if ($server_range < 10) {
				$servers_list = \App\Server::where('software_id', $software->id)->where('status', 1)->orderBy('priority', 'asc')->get();

				foreach ($servers_list as $server_list) {
					$expiry_date = intval($server_list->expiry_date);
					$date = \Carbon\Carbon::parse($server_list->created_at);
					$now = \Carbon\Carbon::now();
					$diff = $date->diffInDays($now);
					$days = $expiry_date - $diff;
					$days = (string) $days;
					if (($diff < $expiry_date) && (($server_list->used < $server_list->use) || ($server_list->use == 0))) {
						$servers[] = ['proxy_conf' => $server_list->proxy_conf, 'key' => $server_list->key, 'created_at' => $server_list->created_at, 'last_use' => $server_list->last_use, 'priority' => $server_list->priority, 'type' => 'server', 'id' => $server_list->id];
					}
				}
				usort($servers, function($a, $b) {
					if ($a['created_at'] == $b['created_at']) {
						return 0;
					}

					return $a['created_at'] < $b['created_at'] ? 1 : -1;
				});
				usort($servers, function($a, $b) {
					if ($a['priority'] == $b['priority']) {
						return 0;
					}

					return $a['priority'] < $b['priority'] ? 1 : -1;
				});

				if (setting_item('last_using')) {
					usort($servers, function($a, $b) {
						if ($a['last_use'] == $b['last_use']) {
							return 0;
						}

						$last_use_b = $b['created_at'];
						$last_use_a = $a['created_at'];

						if ($b['last_use']) {
							$last_use_b = $b['last_use'];
						}

						if ($a['last_use']) {
							$last_use_a = $a['last_use'];
						}

						return $last_use_b < $last_use_a ? 1 : -1;
					});
				}

				if ($server_range < count($servers)) {
					$server = $servers;

					if (is_array($server)) {
						$server = (object) $server[0];

						if ($server) {
							$current_date = date('Y-m-d H:i:s');

							if ($server->type == 'server') {
								$server_insert = \App\Server::find($server->id);
								$server_insert->used = $server_insert->used + 1;
								$server_insert->last_use = $current_date;
								$server_insert->save();
							}
							else {
								$server_insert = \App\ProxySoftware::find($server->id);
								$server_insert->used = $server_insert->used + 1;
								$server_insert->last_use = $current_date;
								$server_insert->save();
							}

							return response()->json(['status' => 'success', 'proxy_conf' => generate_proxy(env('Proxyrack_type', 'socks5'), env('Proxyrack_ip', ''), env('Proxyrack_port', '222'), env('Proxyrack_username', ''), env('Proxyrack_password', ''), '', '', ''), 'key' => $server->key]);
						}
						else {
							return response()->json(['status' => 'error', 'proxy_conf' => '', 'key' => '']);
						}
					}
				}
				else {
					return response()->json(['status' => 'error', 'proxy_conf' => '', 'key' => '']);
				}
			}
			else {
				return response()->json(['status' => 'error', 'proxy_conf' => '', 'key' => '']);
			}
		}
		else if (10 < $server_range) {
			return response()->json(['status' => 'error', 'proxy_conf' => '', 'key' => '']);
		}
		else {
			$output = '';
			if (($license_key == 'cpanel') || ($license_key == 'dcpanel')) {
				return response()->json(['status' => 'success', 'proxy_conf' => generate_proxy(env('Proxyrack_type', 'socks5'), env('Proxyrack_ip', ''), env('Proxyrack_port', '222'), env('Proxyrack_username', ''), env('Proxyrack_password', ''), '', '', ''), 'key' => '']);
				$full_path = base_path() . '/proxy.list';
				$proxies = preg_split('/\\r\\n|\\r|\\n/', file_get_contents($full_path));
				$rand_keys = array_rand($proxies, 2);
				$proxy = $proxies[$rand_keys[0]];
				$ip = explode(':', $proxy)[0];
				$port = explode(':', $proxy)[1];
				return response()->json(['status' => 'success', 'proxy_conf' => generate_proxy('socks5', $ip, $port, 'xonpayment-refreshMinutes-3', '0d5d23-f137a0-aa18c2-b79fdf-423781', '', '', ''), 'key' => '']);
			}
			else {
				return response()->json(['status' => 'success', 'proxy_conf' => generate_proxy(env('Proxyrack_type', 'socks5'), env('Proxyrack_ip', ''), env('Proxyrack_port', '222'), env('Proxyrack_username', ''), env('Proxyrack_password', ''), '', '', ''), 'key' => '']);
			}
		}
	}
}

?>