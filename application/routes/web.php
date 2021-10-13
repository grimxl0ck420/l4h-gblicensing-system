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
Route::get('/', function() {
	echo 'Coming soon';
});
Route::get('/date/current', function() {
	echo date('Y-m-d H:d:s');
});
Route::get('/date', function() {
	echo date('Y-m-d');
});
Route::get('/api/gethost', function(Illuminate\Http\Request $request) {
	$host = $request->host;
	echo shell_exec('getent hosts ' . $host . ' | awk \'{ print $1 }\' ');
});
Route::get('getserver', 'ApiController@getServer')->name('getserver');
Route::get('/getip', function() {
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
	echo $addr;
})->name('getip');
Route::group(['prefix' => 'admin', 'middleware' => 'logined'], function() {
	Route::get('/', 'FrontendController@home')->name('home');
	Route::get('/profile', 'FrontendController@profile')->name('profile');
	Route::post('/profile', 'FrontendController@post_profile')->name('pprofile');
	Route::get('/logout', 'FrontendController@logout')->name('logout');
	Route::get('/software', 'FrontendController@softwares')->name('softwares');
	Route::get('/software/delete/{id}', 'FrontendController@software_delete')->name('software.delete');
	Route::get('/software/add', 'FrontendController@software_add')->name('software.add');
	Route::post('/software/add', 'FrontendController@software_addp')->name('software.add');
	Route::get('/software/edit/{id}', 'FrontendController@software_edit')->name('software.edit');
	Route::post('/software/edit/{id}', 'FrontendController@software_editp')->name('software.edit');
	Route::post('/software/bulk_delete', 'FrontendController@bulk_software_delete')->name('software.bulk_delete');
	Route::post('/software/bulk_activate', 'FrontendController@bulk_software_active')->name('software.bulk_activate');
	Route::post('/software/bulk_disable', 'FrontendController@bulk_software_disabled')->name('software.bulk_disable');
	Route::get('/level', 'LevelController@levels')->name('levels');
	Route::get('/level/delete/{id}', 'LevelController@level_delete')->name('level.delete');
	Route::get('/level/add', 'LevelController@level_add')->name('level.add');
	Route::post('/level/add', 'LevelController@level_addp')->name('level.add');
	Route::get('/level/edit/{id}', 'LevelController@level_edit')->name('level.edit');
	Route::post('/level/edit/{id}', 'LevelController@level_editp')->name('servleveler.edit');
	Route::post('/level/bulk_delete', 'LevelController@bulk_level_delete')->name('level.bulk_delete');
	Route::get('/server', 'FrontendController@servers')->name('servers');
	Route::get('/server/delete/{id}', 'FrontendController@server_delete')->name('server.delete');
	Route::get('/server/add', 'FrontendController@server_add')->name('server.add');
	Route::post('/server/add', 'FrontendController@server_addp')->name('server.add');
	Route::get('/server/edit/{id}', 'FrontendController@server_edit')->name('server.edit');
	Route::post('/server/edit/{id}', 'FrontendController@server_editp')->name('server.edit');
	Route::post('/server/bulk_delete', 'FrontendController@bulk_server_delete')->name('server.bulk_delete');
	Route::post('/server/bulk_activate', 'FrontendController@bulk_server_active')->name('server.bulk_activate');
	Route::post('/server/bulk_disable', 'FrontendController@bulk_server_disabled')->name('server.bulk_disable');
	Route::get('/proxy', 'FrontendController@proxies')->name('proxies');
	Route::get('/proxy/delete/{id}', 'FrontendController@proxy_delete')->name('proxy.delete');
	Route::get('/proxy/add', 'FrontendController@proxy_add')->name('proxy.add');
	Route::post('/proxy/add', 'FrontendController@proxy_addp')->name('proxy.add');
	Route::get('/proxy/edit/{id}', 'FrontendController@proxy_edit')->name('proxy.edit');
	Route::post('/proxy/edit/{id}', 'FrontendController@proxy_editp')->name('proxy.edit');
	Route::post('/proxy/bulk_delete', 'FrontendController@bulk_proxy_delete')->name('proxy.bulk_delete');
	Route::post('/proxy/bulk_activate', 'FrontendController@bulk_proxy_active')->name('proxy.bulk_activate');
	Route::post('/proxy/bulk_disable', 'FrontendController@bulk_proxy_disabled')->name('proxy.bulk_disable');
	Route::get('/license', 'FrontendController@licenses')->name('licenses');
	Route::get('/license/delete/{id}', 'FrontendController@license_delete')->name('license.delete');
	Route::get('/license/add', 'FrontendController@license_add')->name('license.add');
	Route::post('/license/add', 'FrontendController@license_addp')->name('license.add');
	Route::get('/license/edit/{id}', 'FrontendController@license_edit')->name('license.edit');
	Route::post('/license/edit/{id}', 'FrontendController@license_editp')->name('license.edit');
	Route::post('/license/bulk_delete', 'FrontendController@bulk_license_delete')->name('license.bulk_delete');
	Route::post('/license/bulk_activate', 'FrontendController@bulk_license_active')->name('license.bulk_activate');
	Route::post('/license/bulk_disable', 'FrontendController@bulk_license_disabled')->name('license.bulk_disable');
	Route::get('/reseller', 'FrontendController@resellers')->name('resellers');
	Route::get('/reseller/delete/{id}', 'FrontendController@reseller_delete')->name('reseller.delete');
	Route::get('/reseller/add', 'FrontendController@reseller_add')->name('reseller.add');
	Route::post('/reseller/add', 'FrontendController@reseller_addp')->name('reseller.add');
	Route::get('/reseller/edit/{id}', 'FrontendController@reseller_edit')->name('reseller.edit');
	Route::post('/reseller/edit/{id}', 'FrontendController@reseller_editp')->name('reseller.edit');
	Route::post('/reseller/bulk_delete', 'FrontendController@bulk_reseller_delete')->name('reseller.bulk_delete');
	Route::post('/reseller/bulk_activate', 'FrontendController@bulk_reseller_active')->name('reseller.bulk_activate');
	Route::post('/reseller/bulk_disable', 'FrontendController@bulk_reseller_disabled')->name('reseller.bulk_disable');
	Route::get('/reseller/getclients', 'FrontendController@getClients')->name('getClients');
	Route::get('/message', 'MessageController@index')->name('message.index');
	Route::post('/message', 'MessageController@update')->name('message.update');
	Route::get('/settings', 'SettingController@view')->name('setting.view');
	Route::post('/settings', 'SettingController@update')->name('setting.update');
	Route::get('/api', 'SettingController@view_api')->name('api.view');
	Route::post('/api', 'SettingController@update_api')->name('api.update');
	Route::get('/blacklist', 'BlacklistController@view')->name('blacklist');
	Route::get('/blacklist/delete/{id}', 'BlacklistController@delete')->name('blacklist.delete');
	Route::get('/blacklist/add', 'BlacklistController@add')->name('blacklist.add');
	Route::post('/blacklist/add', 'BlacklistController@addp')->name('blacklist.add');
	Route::get('/blacklist/edit/{id}', 'BlacklistController@edit')->name('blacklist.edit');
	Route::post('/blacklist/edit/{id}', 'BlacklistController@editp')->name('blacklist.edit');
	Route::post('/blacklist/bulk_delete', 'BlacklistController@bulk_delete')->name('blacklist.bulk_delete');
	Route::post('/blacklist/bulk_activate', 'BlacklistController@bulk_active')->name('blacklist.bulk_activate');
	Route::post('/blacklist/bulk_disable', 'BlacklistController@bulk_disabled')->name('blacklist.bulk_disable');
	Route::get('/whitelist', 'WhitelistController@view')->name('whitelist');
	Route::get('/whitelist/delete/{id}', 'WhitelistController@delete')->name('whitelist.delete');
	Route::get('/whitelist/add', 'WhitelistController@add')->name('whitelist.add');
	Route::post('/whitelist/add', 'WhitelistController@addp')->name('whitelist.add');
	Route::get('/whitelist/edit/{id}', 'WhitelistController@edit')->name('whitelist.edit');
	Route::post('/whitelist/edit/{id}', 'WhitelistController@editp')->name('whitelist.edit');
	Route::post('/whitelist/bulk_delete', 'WhitelistController@bulk_delete')->name('whitelist.bulk_delete');
	Route::post('/whitelist/bulk_activate', 'WhitelistController@bulk_active')->name('whitelist.bulk_activate');
	Route::post('/whitelist/bulk_disable', 'WhitelistController@bulk_disabled')->name('whitelist.bulk_disable');
	Route::get('/virtualserver', 'VirtualServerController@view')->name('virtualserver');
	Route::get('/virtualserver/delete/{id}', 'VirtualServerController@delete')->name('virtualserver.delete');
	Route::get('/virtualserver/add', 'VirtualServerController@add')->name('virtualserver.add');
	Route::post('/virtualserver/add', 'VirtualServerController@addp')->name('virtualserver.add');
	Route::get('/virtualserver/edit/{id}', 'VirtualServerController@edit')->name('virtualserver.edit');
	Route::post('/virtualserver/edit/{id}', 'VirtualServerController@editp')->name('virtualserver.edit');
	Route::post('/virtualserver/bulk_delete', 'VirtualServerController@bulk_delete')->name('virtualserver.bulk_delete');
	Route::post('/virtualserver/bulk_activate', 'VirtualServerController@bulk_active')->name('virtualserver.bulk_activate');
	Route::post('/virtualserver/bulk_disable', 'VirtualServerController@bulk_disabled')->name('virtualserver.bulk_disable');
	Route::get('/buyer', 'buyerController@view')->name('buyer');
	Route::get('/buyer/delete/{id}', 'buyerController@delete')->name('buyer.delete');
	Route::get('/buyer/add', 'buyerController@add')->name('buyer.add');
	Route::post('/buyer/add', 'buyerController@addp')->name('buyer.add');
	Route::get('/buyer/edit/{id}', 'buyerController@edit')->name('buyer.edit');
	Route::post('/buyer/edit/{id}', 'buyerController@editp')->name('buyer.edit');
	Route::post('/buyer/bulk_delete', 'buyerController@bulk_delete')->name('buyer.bulk_delete');
	Route::post('/buyer/bulk_activate', 'buyerController@bulk_active')->name('buyer.bulk_activate');
	Route::post('/buyer/bulk_disable', 'buyerController@bulk_disabled')->name('buyer.bulk_disable');
});
Route::group(['prefix' => 'api', 'middleware' => 'checkWhmcs'], function() {
	Route::post('/whmcs/verify', 'ApiController@whmcs')->middleware('apichecker')->name('whmcs');
});
Route::group(['prefix' => 'api', 'middleware' => 'checkLicense'], function() {
	Route::get('/getinfo', 'ApiController@getInfo')->name('apiInfo');
	Route::get('/license', 'ApiController@license')->name('apiLicense');
	Route::get('/change', 'ApiController@change')->name('apiChange');
	Route::get('/change1', 'ApiController@change1')->name('apiChange1');
	Route::get('/change2', 'ApiController@change2')->name('apiChange2');
	Route::get('/change3', 'ApiController@change3')->name('apiChange3');
	Route::get('/softaculous', 'ApiController@softaculous')->name('softaculous');
	Route::get('/virtualizor', 'ApiController@virtualizor')->name('virtualizor');
	Route::get('/{key}/getlicense', 'ApiController@getLicenseHash')->name('EncodeLicense');
	Route::get('/files/{folder}/{file?}', 'ApiController@files')->name('getfiles')->where('file', '(.*)');
	Route::get('/gbv2/{folder}/{file?}', 'ApiController@gbv2')->name('gbv2')->where('file', '(.*)');
});
Route::get('/api/verifylicense', 'ApiController@verifyLicense')->name('verifylicense');
Route::get('/api/data/{file}', 'ApiController@data')->name('getdata');
Route::group(['prefix' => 'resellerapi', 'middleware' => 'checkReseller'], function() {
	Route::get('/getlist', 'ApiController@getlist')->name('getblanace');
	Route::get('/register', 'ApiController@registerLicense')->name('registerlicense');
	Route::get('/licenseinfo', 'ApiController@getResellerLicenseInfo')->middleware('checkResellerLicense')->name('getresellerlicenseinfo');
	Route::get('/getblanace', 'ApiController@getBlanace')->name('getblanace');
	Route::get('/activate', 'ApiController@activateLicense')->middleware('checkResellerLicense')->name('activatelicense');
	Route::get('/deactivate', 'ApiController@deactivateLicense')->middleware('checkResellerLicense')->name('deactivatelicense');
	Route::get('/changeiplicense', 'ApiController@changeIpLicense')->middleware('checkResellerLicense')->name('changeiplicense');
	Route::get('/delete', 'ApiController@deleteLicense')->middleware('checkResellerLicense')->name('deletelicense');
});
Route::group(['prefix' => 'api/reseller', 'middleware' => 'apichecker'], function() {
	Route::get('/getplans', 'ApiController@getplans')->name('getplans');
	Route::get('/addbalance', 'ApiController@addBalance')->name('addBalance');
	Route::get('/register', 'ApiController@registerReseller')->name('registerreseller');
	Route::get('/info', 'ApiController@getResellerInfo')->name('getresellerinfo');
	Route::get('/activate', 'ApiController@activateReseller')->name('activatereseller');
	Route::get('/deactivate', 'ApiController@deactivateReseller')->name('deactivatereseller');
	Route::get('/delete', 'ApiController@deleteReseller')->name('deletereseller');
	Route::get('/getbuyers', 'ApiController@getbuyers')->name('getbuyers');
});
Route::group(['prefix' => 'resellerapi', 'middleware' => 'globalReseller'], function() {
	Route::get('/getmsg', 'ApiController@getmsg')->name('getmsg');
	Route::get('/getstatus', 'ApiController@getstatus')->name('getstatus');
	Route::get('/getpackage', 'ApiController@getpackage')->name('getpackage');
	Route::get('/getsoftwares', 'ApiController@getsoftwares')->name('getsoftwares');
});
Route::group(['prefix' => 'admin', 'middleware' => 'notLogined'], function() {
	Route::get('/login', 'FrontendController@login')->name('login');
	Route::post('/login', 'FrontendController@plogin')->name('plogin');
});

?>