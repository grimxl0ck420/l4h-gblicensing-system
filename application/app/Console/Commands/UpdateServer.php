<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Console\Commands;

class UpdateServer extends \Illuminate\Console\Command
{
    protected $description = "update:server";
    public function __construct()
    {
        $this::__construct();
    }
    public function handle()
    {
        $servers = \App\Server::where("status", 1)->get();
        if (0 < count($servers)) {
            foreach ($servers as $server) {
                $expiry_date = intval($server->expiry_date);
                $date = \Carbon\Carbon::parse($server->created_at);
                $now = \Carbon\Carbon::now();
                $diff = $date->diffInDays($now);
                if ($expiry_date < $diff) {
                    $server = \App\Server::find($server->id);
                    $server->status = 0;
                    $server->save();
                }
                $ProxySoftware = \App\ProxySoftware::where("status", 1)->get();
                foreach ($ProxySoftware as $one_proxy) {
                    $expiry_date_software = intval($one_proxy->expiry_date);
                    $date_software = \Carbon\Carbon::parse($one_proxy->created_at);
                    $now_software = \Carbon\Carbon::now();
                    $diff_software = $date_software->diffInDays($now_software);
                    $days_software = $expiry_date_software - $diff_software;
                    $days_software = (string) $days_software;
                    if ($expiry_date_software < $diff_software) {
                        $software_proxy = \App\ProxySoftware::find($one_proxy->id);
                        $software_proxy->status = 0;
                        $software_proxy->save();
                    }
                }
                $proxies = \App\Proxy::where("status", 1)->get();
                foreach ($proxies as $proxy) {
                    $port = $proxy->port;
                    $ip = $proxy->ip;
                    $type = $proxy->type;
                    $expiry_date = intval($proxy->expiry_date);
                    $date = \Carbon\Carbon::parse($proxy->created_at);
                    $now = \Carbon\Carbon::now();
                    $diff = $date->diffInDays($now);
                    $days = $expiry_date - $diff;
                    $days = (string) $days;
                    if ($expiry_date < $diff) {
                        $update_proxy = \App\Proxy::find($proxy->id);
                        $update_proxy->status = 0;
                        $update_proxy->save();
                    }
                }
            }
        }
    }
}

?>