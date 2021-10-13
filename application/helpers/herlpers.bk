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

function sm_reverse_bits($orig)
{
	$v = decbin(ord($orig));
	$pad = str_pad($v, 8, '0', STR_PAD_LEFT);
	$rev = strrev($pad);
	$bin = bindec($rev);
	$chr = chr($bin);
	return $chr;
}

function soft_decode($txt)
{
	$from = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
	$to = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')'];
	$txt = base64_encode($txt);
	$txt = str_replace($from, $to, $txt);
	$txt = gzcompress($txt);
	$txt = base64_encode($txt);
	return $txt;
}

function generateRandomString($length = 10)
{
	return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function build_http_query($query)
{
	$query_array = [];

	foreach ($query as $key => $key_value) {
		$query_array[] = urlencode($key) . '=' . urlencode($key_value);
	}

	return implode('&', $query_array);
}

function generate_whmcs_license($brand)
{
	return $brand . '-' . strtolower(generaterandomstring(20));
}

function register_whmcs_license($key, $domain, $ip, $validdirs, $month, $expire_date, $version)
{
	if ($month == '1') {
		$billingcycle = 'Monthly';
	}
	else if ($month == '3') {
		$billingcycle = 'Quarterly';
	}
	else if ($month == '6') {
		$billingcycle = 'Semi-Annually';
	}
	else if ($month == '12') {
		$billingcycle = 'Annually';
	}

	$date_expire = date('Y-m-d', strtotime('+' . $month . ' month'));
	$results = [];
	$results['productname'] = 'Owned Business License';
	$results['registeredname'] = $domain;
	$results['productid'] = 5;
	$results['validdomains'] = $domain;
	$results['validips'] = $ip;
	$results['billingcycle'] = $billingcycle;
	$results['status'] = 'Active';
	$results['validdirs'] = $validdirs;
	$results['version'] = $version;
	$results['key'] = $key;
	$results['regdate'] = date('Y-m-01');
	$results['checkdate'] = date('Y-m-d');
	$results['nextduedate'] = date('Y-m-d', strtotime($expire_date));
	$results['ClientLimit'] = 999999;
	$results['ClientLimitsEnabled'] = false;
	return $results;
}

function encode($plain_text)
{
	$private_key = '-----BEGIN RSA PRIVATE KEY----- MIICXQIBAAKBgQCuUVXgRSXPSklApFoBoZDw8uAgHCtYZUlecV7iLRJI29eTEKBU 5gUoFti6F4cdI9uRSgJxmhlJf57TbgsJ8yk8b37lqPKLnQv4xOcjaU1bN7p9HX60 JJmYCmAROiG0DuplfUjVw0tEs7o5Op/5OCqRKZh4/HuVIZZhC8OiA+ZFgwIDAQAB AoGAR04OCsc+SCTjAgY4qyIj3+v5sijTsjz8Xh2R6oL1T8hdzlKmwxO0WEnALZ8i LdFVJ4FWrpGSdnY1ydbhvRgybVF6m9ITskulC0HV2W53z0HiouBVTAdso+dJG32I FnsyxuBj/IDrjFdQCtXe2EQ5a7O9IXXSCVp0fw/eU5zzuIECQQDUcBXiagxNeEJh rsl13SAgeyhjN01a2Co7fALIufBFxw2zX6wdopT1/25/qah069IVyvJVfjngMdPW mZeBaFv7AkEA0hAi2UEtzbYtWHAWrpg1ChbfWz3jCbEgAB4qpVHgobTHhkYWuwyP oLvq1hD+wuxkpxWrclHvCX36B22xoYO+GQJBAJRpbdCM1+VzY6TMsHAIOL6Ya+HM q90QcYi3HVbQF90XsCmlaCAYCktF1ROZGlf8u/t/mgdCNPq8tMsS6HZ+yusCQQCo t+klkiJV3YLiS3UMWpgPOHvBbx2RxUAsmA4spmzDtM2k3VqYdehOc2CU+yWELhZR 1SfVNFXHy/UsTkCjt4rRAkB+hf3KVAYf1lCFNg4aLSME7SzEWJu+qbI9UN5ZIumQ 4zEr6fEo1I5w3oCnYeOPaw9z/j6WACb1HF7m89sj4cYO -----END RSA PRIVATE KEY-----';
	$rsa = new phpseclib\Crypt\RSA();
	$rsa->setEncryptionMode(phpseclib\Crypt\RSA::SIGNATURE_PKCS1);
	$rsa->loadKey($private_key);
	$decrypted = $rsa->encrypt($plain_text);
	return ['data' => $decrypted, 'sign' => $rsa->sign($plain_text)];
}

function sign_hash($plain_text)
{
	$private_key = '-----BEGIN RSA PRIVATE KEY----- MIICXQIBAAKBgQCuUVXgRSXPSklApFoBoZDw8uAgHCtYZUlecV7iLRJI29eTEKBU 5gUoFti6F4cdI9uRSgJxmhlJf57TbgsJ8yk8b37lqPKLnQv4xOcjaU1bN7p9HX60 JJmYCmAROiG0DuplfUjVw0tEs7o5Op/5OCqRKZh4/HuVIZZhC8OiA+ZFgwIDAQAB AoGAR04OCsc+SCTjAgY4qyIj3+v5sijTsjz8Xh2R6oL1T8hdzlKmwxO0WEnALZ8i LdFVJ4FWrpGSdnY1ydbhvRgybVF6m9ITskulC0HV2W53z0HiouBVTAdso+dJG32I FnsyxuBj/IDrjFdQCtXe2EQ5a7O9IXXSCVp0fw/eU5zzuIECQQDUcBXiagxNeEJh rsl13SAgeyhjN01a2Co7fALIufBFxw2zX6wdopT1/25/qah069IVyvJVfjngMdPW mZeBaFv7AkEA0hAi2UEtzbYtWHAWrpg1ChbfWz3jCbEgAB4qpVHgobTHhkYWuwyP oLvq1hD+wuxkpxWrclHvCX36B22xoYO+GQJBAJRpbdCM1+VzY6TMsHAIOL6Ya+HM q90QcYi3HVbQF90XsCmlaCAYCktF1ROZGlf8u/t/mgdCNPq8tMsS6HZ+yusCQQCo t+klkiJV3YLiS3UMWpgPOHvBbx2RxUAsmA4spmzDtM2k3VqYdehOc2CU+yWELhZR 1SfVNFXHy/UsTkCjt4rRAkB+hf3KVAYf1lCFNg4aLSME7SzEWJu+qbI9UN5ZIumQ 4zEr6fEo1I5w3oCnYeOPaw9z/j6WACb1HF7m89sj4cYO -----END RSA PRIVATE KEY-----';
	$rsa = new phpseclib\Crypt\RSA();
	$rsa->setEncryptionMode(phpseclib\Crypt\RSA::SIGNATURE_PKCS1);
	$rsa->loadKey($private_key);
	return $rsa->sign($plain_text);
}

function decode($decrypted)
{
	$public_key = '-----BEGIN PUBLIC KEY----- MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCuUVXgRSXPSklApFoBoZDw8uAg HCtYZUlecV7iLRJI29eTEKBU5gUoFti6F4cdI9uRSgJxmhlJf57TbgsJ8yk8b37l qPKLnQv4xOcjaU1bN7p9HX60JJmYCmAROiG0DuplfUjVw0tEs7o5Op/5OCqRKZh4 /HuVIZZhC8OiA+ZFgwIDAQAB -----END PUBLIC KEY-----';
	$rsa1 = new phpseclib\Crypt\RSA();
	$rsa1->setEncryptionMode(phpseclib\Crypt\RSA::SIGNATURE_PKCS1);
	$rsa1->loadKey($public_key);
	return $rsa1->decrypt($decrypted);
}

function is_ip($ip)
{
	return filter_var($ip, FILTER_VALIDATE_IP);
}

function site_name()
{
	return App\Setting::where('key', __FUNCTION__)->first()->value;
}

function setting_item($key)
{
	if (App\Setting::where('key', $key)->first()) {
		return App\Setting::where('key', $key)->first()->value;
	}

	return '';
}

function whmcs_get_balance($clientId)
{
	$whmcs_username = setting_item('whmcs_username');
	$whmcs_password = setting_item('whmcs_password');
	$whmcs_domain = setting_item('whmcs_domain');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://' . $whmcs_domain . '/includes/api.php');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['action' => 'GetClientsDetails', 'username' => $whmcs_username, 'password' => $whmcs_password, 'clientid' => $clientId, 'responsetype' => 'json']));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
	$output = json_decode($response, true);

	if ($output['result'] == 'success') {
		return floatval($output['credit']);
	}

	return 0;
}

function whmcs_get_clients($search = '')
{
	$whmcs_username = setting_item('whmcs_username');
	$whmcs_password = setting_item('whmcs_password');
	$whmcs_domain = setting_item('whmcs_domain');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://' . $whmcs_domain . '/includes/api.php');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['action' => 'GetClients', 'username' => $whmcs_username, 'password' => $whmcs_password, 'search' => $search, 'responsetype' => 'json']));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
	$output = json_decode($response, true);

	if ($output['result'] == 'success') {
		return $output;
	}

	return [];
}

function whmcs_get_client($clientid = '')
{
	$whmcs_username = setting_item('whmcs_username');
	$whmcs_password = setting_item('whmcs_password');
	$whmcs_domain = setting_item('whmcs_domain');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://' . $whmcs_domain . '/includes/api.php');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['action' => 'GetClientsDetails', 'username' => $whmcs_username, 'password' => $whmcs_password, 'clientid' => $clientid, 'stats' => true, 'responsetype' => 'json']));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
	$output = json_decode($response, true);

	if ($output['result'] == 'success') {
		return $output;
	}

	return [];
}

function whmcs_create_invoice($clientId, $software_id, $credit)
{
	$whmcs_username = setting_item('whmcs_username');
	$whmcs_password = setting_item('whmcs_password');
	$whmcs_domain = setting_item('whmcs_domain');
	$software = App\Software::find($software_id);

	if ($software) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://' . $whmcs_domain . '/includes/api.php');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['action' => 'CreateInvoice', 'username' => $whmcs_username, 'password' => $whmcs_password, 'userid' => $clientId, 'paymentmethod' => 'credit', 'sendinvoice' => '1', 'status' => 'Unpaid', 'taxrate' => '0', 'date' => date('Y-m-d'), 'duedate' => date('Y-m-d', strtotime('+7 day')), 'itemdescription1' => $software->name . ' License ', 'itemamount1' => $credit, 'itemtaxed1' => '0', 'notes' => $software->name . ' License ', 'autoapplycredit' => '1', 'responsetype' => 'json']));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		$output = json_decode($response, true);
		if (($output['result'] == 'success') && ($output['invoiceid'] != '')) {
			return true;
		}

		return false;
	}

	return false;
}

function setting_item_value($value)
{
	if (App\Setting::where('value', $value)->first()) {
		return App\Setting::where('value', $value)->first()->key;
	}

	return NULL;
}

function usingProxy()
{
	$test_HTTP_proxy_headers = ['HTTP_VIA', 'VIA', 'Proxy-Connection', 'HTTP_X_FORWARDED_FOR', 'HTTP_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED', 'HTTP_CLIENT_IP', 'HTTP_FORWARDED_FOR_IP', 'X-PROXY-ID', 'MT-PROXY-ID', 'X-TINYPROXY', 'X_FORWARDED_FOR', 'FORWARDED_FOR', 'X_FORWARDED', 'FORWARDED', 'CLIENT-IP', 'CLIENT_IP', 'PROXY-AGENT', 'HTTP_X_CLUSTER_CLIENT_IP', 'FORWARDED_FOR_IP', 'HTTP_PROXY_CONNECTION'];

	foreach ($test_HTTP_proxy_headers as $header) {
		if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) {
			return true;
		}
	}

	$proxy_ports = [80, 81, 8080, 443, 1080, 6588, 3128];

	foreach ($proxy_ports as $test_port) {
		if (@fsockopen($_SERVER['REMOTE_ADDR'], $test_port, $errno, $errstr, 5)) {
			return true;
		}
	}

	return false;
}

function generate_proxy($type, $ip, $port, $username, $password, $backend_type = '', $backend_ip = '', $backend_port = '')
{
	$backend_string = $backend_type . ' ' . $backend_ip . ' ' . $backend_port . ' ';

	if ($backend_type != '') {
		$string = 'dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . $backend_string . "\r\n" . $type . ' ' . $ip . ' ' . $port . ' ' . $username . ' ' . $password;
	}
	else {
		$string = 'dynamic_chain' . "\r\n" . '[ProxyList]' . "\r\n" . $type . ' ' . $ip . ' ' . $port . ' ' . $username . ' ' . $password;
	}

	return $string;
}

function getip()
{
	$v4mapped_prefix_hex = '00000000000000000000ffff';
	$v4mapped_prefix_bin = pack('H*', $v4mapped_prefix_hex);
	$addr = $_SERVER['REMOTE_ADDR'];
	$addr_bin = inet_pton($addr);

	if ($addr_bin === false) {
		exit('Invalid IP address');
	}

	if (substr($addr_bin, 0, strlen($v4mapped_prefix_bin)) == $v4mapped_prefix_bin) {
		$addr_bin = substr($addr_bin, strlen($v4mapped_prefix_bin));
	}

	$addr = inet_ntop($addr_bin);
	return $addr;
}

if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

?>