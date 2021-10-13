<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Controllers;

class SettingController extends Controller
{
    public function view()
    {
        $setting = \App\Setting::all();
        $site_name = \App\Setting::where("key", "site_name")->first();
        $whmcs_username = \App\Setting::where("key", "whmcs_username")->first();
        $whmcs_password = \App\Setting::where("key", "whmcs_password")->first();
        $whmcs_domain = \App\Setting::where("key", "whmcs_domain")->first();
        $client_login = \App\Setting::where("key", "client_login")->first();
        $proxy_using = \App\Setting::where("key", "proxy_using")->first();
        $IP_whitelist = \App\Setting::where("key", "IP_whitelist")->first();
        $last_using = \App\Setting::where("key", "last_using")->first();
        return view("settings", compact("whmcs_domain", "whmcs_username", "whmcs_password", "setting", "site_name", "client_login", "proxy_using", "IP_whitelist", "last_using"));
    }
    public function update(\Illuminate\Http\Request $request)
    {
        \App\Setting::where("key", "site_name")->update(["value" => $request->site_name ? $request->site_name : ""]);
        \App\Setting::where("key", "whmcs_username")->update(["value" => $request->whmcs_username ? $request->whmcs_username : ""]);
        \App\Setting::where("key", "whmcs_password")->update(["value" => $request->whmcs_password ? $request->whmcs_password : ""]);
        \App\Setting::where("key", "whmcs_domain")->update(["value" => $request->whmcs_domain ? $request->whmcs_domain : ""]);
        \App\Setting::where("key", "proxy_using")->update(["value" => $request->proxy_using ? "1" : ""]);
        \App\Setting::where("key", "IP_whitelist")->update(["value" => $request->IP_whitelist ? "1" : ""]);
        \App\Setting::where("key", "last_using")->update(["value" => $request->last_using ? "1" : ""]);
        return back()->with("success", "Settings Updated Sucessfully");
    }
    public function view_api()
    {
        $api_key = \App\Setting::where("key", "api_key")->first();
        $enable_api = \App\Setting::where("key", "enable_api")->first();
        return view("api_key", compact("api_key", "enable_api"));
    }
    public function update_api(\Illuminate\Http\Request $request)
    {
        $token = md5(time() . "-" . uniqid() . "-" . time());
        \App\Setting::where("key", "api_key")->update(["value" => $token]);
        \App\Setting::where("key", "enable_api")->update(["value" => $request->enable_api ? "1" : ""]);
        return back()->with("success", "Api Updated Sucessfully");
    }
}

?>