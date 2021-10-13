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

namespace App\Http\Controllers;

class FrontendController extends Controller
{
	public function home()
	{
		$chart_options = ['chart_title' => 'License by months', 'report_type' => 'group_by_date', 'model' => 'App\\License', 'group_by_field' => 'updated_at', 'group_by_period' => 'month', 'chart_type' => 'bar'];
		$chart1 = new \LaravelDaily\LaravelCharts\Classes\LaravelChart($chart_options);
		$active_reseller = \App\Reseller::where('end_at', '>=', date('Y-m-d'))->get();
		$active_softwares = \App\Software::where('status', 1)->get();
		return view('home', compact('chart1', 'active_reseller', 'active_softwares'));
	}

	public function profile()
	{
		return view('profile');
	}

	public function post_profile(\Illuminate\Http\Request $request)
	{
		$rules = ['password' => 'required_with:cpassword|same:cpassword|min:6', 'cpassword' => 'min:6'];
		$this->validate($request, $rules);
		$user = \Auth::user();
		$user->password = \Hash::make($request->password);
		$user->save();
		return back()->with('success', 'Profile info updated successfully');
	}

	public function login()
	{
		return view('login');
	}

	public function bulk_software_active(\Illuminate\Http\Request $request)
	{
		\App\Software::whereIn('id', $request->id)->update(['status' => 1]);
		return back()->with('success', 'Items activiated successfully');
	}

	public function bulk_software_disabled(\Illuminate\Http\Request $request)
	{
		\App\Software::whereIn('id', $request->id)->update(['status' => 0]);
		return back()->with('success', 'Items disabled successfully');
	}

	public function bulk_software_delete(\Illuminate\Http\Request $request)
	{
		\App\Software::destroy($request->id);
		return back()->with('success', 'Items deleted successfully');
	}

	public function software_delete($id)
	{
		$software = \App\Software::findorfail($id);
		$software->delete();
		\App\License::where('software_id', $software->id)->delete();
		\App\Server::where('software_id', $software->id)->delete();
		return back()->with('success', $software->name . ' is deleted successfully');
	}

	public function software_add()
	{
		$softwares = \App\Software::where('status', 1)->get();
		return view('softwares.add', compact('softwares'));
	}

	public function software_edit($id)
	{
		$software = \App\Software::findorfail($id);
		$softwares1 = \App\Software::where('status', 1)->where('id', '!=', $id)->get();
		return view('softwares.edit', compact('software', 'softwares1'));
	}

	public function software_editp($id, \Illuminate\Http\Request $request)
	{
		$software = \App\Software::findorfail($id);
		$rules = ['name' => 'required', 'key' => 'required', 'cmd' => 'required'];
		$this->validate($request, $rules);
		$software->name = $request->name;
		$software->price_reseller = intval($request->price_reseller);
		$software->key = $request->key;
		$software->cmd = $request->cmd;
		$software->softwares = (is_array($request->softwares) ? \json_encode($request->softwares) : \json_encode([]));
		$software->status = ($request->status == '1' ? 1 : 0);
		$software->change_ip = ($request->change_ip == '1' ? 1 : 0);
		$software->save();
		return back()->with('success', 'Updated Sucessfully');
	}

	public function software_addp(\Illuminate\Http\Request $request)
	{
		$rules = ['name' => 'required', 'key' => 'required', 'cmd' => 'required'];
		$this->validate($request, $rules);
		$software = new \App\Software();
		$software->name = $request->name;
		$software->price_reseller = intval($request->price_reseller);
		$software->key = $request->key;
		$software->cmd = $request->cmd;
		$software->softwares = (is_array($request->softwares) ? \json_encode($request->softwares) : \json_encode([]));
		$software->status = ($request->status == '1' ? 1 : 0);
		$software->change_ip = ($request->change_ip == '1' ? 1 : 0);
		$software->save();
		return back()->with('success', 'Created Sucessfully');
	}

	public function softwares(\Illuminate\Http\Request $request)
	{
		if ($request->ajax()) {
			$data = \App\Software::latest()->get();
			return \DataTables::of($data)->addIndexColumn()->addColumn('action', function($row) {
				$btn = '<a href="' . route('software.edit', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
				$btn .= '<a href="' . route('software.delete', $row->id) . '" onclick="deleteit(event)" class="edit btn btn-danger btn-sm">Delete</a>';
				return $btn;
			})->rawColumns(['action'])->editColumn('status', function($row) {
				return $row->status == 1 ? 'Active' : 'Disabled';
			})->make(true);
		}

		return view('softwares');
	}

	public function proxies(\Illuminate\Http\Request $request)
	{
		if ($request->ajax()) {

			$data = \App\Proxy::latest()->get();
			return \DataTables::of($data)->addIndexColumn()->addColumn('action', function($row) {
				$btn = '<a href="' . route('proxy.edit', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
				$btn .= '<a href="' . route('proxy.delete', $row->id) . '" onclick="deleteit(event)" class="edit btn btn-danger btn-sm">Delete</a>';
				return $btn;
			})->addIndexColumn()->addColumn('software', function($row) {
				$softwares = \App\ProxySoftware::where('proxy_id', $row->id)->get();
				$soft = [];

				foreach ($softwares as $software) {
					if (\App\Software::find($software->software_id)) {
						$soft[] = \App\Software::find($software->software_id)->name;
					}
				}

				$text = '<p>' . join(',', $soft) . '</p>';
				return $text;
			})->rawColumns(['action', 'software', 'status'])->editColumn('status', function($row) {
				if ($row) {
					$expiry_date = intval($row->expiry_date);
					$date = \Carbon\Carbon::parse($row->created_at);
					$now = \Carbon\Carbon::now();
					$diff = $date->diffInDays($now);
					$days = $expiry_date - $diff;
					$days = (string) $days;
					$end_at = (!($expiry_date < $diff) ? 'Expire after ' . $days : 'Expired');
					$color = ($end_at != 'Expired' ? 'green' : 'red');
					$status = ($row->status == 1 ? 'Active' : 'Disabled');
					$str = '<div >' . $status;
					$str .= '<br> <span style=\'color:' . $color . '\'>' . $end_at . '</span></div>';
					return $str;
				}
			})->make(true);
		}

		return view('proxies');
	}

	public function bulk_proxy_active(\Illuminate\Http\Request $request)
	{
		\App\Proxy::whereIn('id', $request->id)->update(['status' => 1]);
		return back()->with('success', 'Items activiated successfully');
	}

	public function bulk_proxy_disabled(\Illuminate\Http\Request $request)
	{
		\App\Proxy::whereIn('id', $request->id)->update(['status' => 0]);
		return back()->with('success', 'Items disabled successfully');
	}

	public function bulk_proxy_delete(\Illuminate\Http\Request $request)
	{
		\App\Proxy::destroy($request->id);
		\App\ProxySoftware::whereIn('proxy_id', $request->id)->delete();
		return back()->with('success', 'Items deleted successfully');
	}

	public function proxy_delete($id)
	{
		$proxy = \App\Proxy::findorfail($id);
		$proxy->delete();
		\App\ProxySoftware::where('proxy_id', $id)->delete();
		return back()->with('success', $proxy->ip . ':' . $proxy->port . ' is deleted successfully');
	}

	public function proxy_add()
	{
		$softwares = \App\Software::where('status', 1)->get();
		return view('proxies.add', compact('softwares'));
	}

	public function proxy_edit($id)
	{
		$proxy = \App\Proxy::findorfail($id);
		$softwares = \App\Software::where('status', 1)->get();
		$proxySoftware = \App\ProxySoftware::where('proxy_id', $id)->get();
		return view('proxies.edit', compact('proxy', 'softwares', 'proxySoftware'));
	}

	public function proxy_editp($id, \Illuminate\Http\Request $request)
	{
		$proxy = \App\Proxy::findorfail($id);
		$rules = ['ip' => 'required', 'port' => 'required', 'type' => 'required|in:socks4,socks5,http,https'];
		$this->validate($request, $rules);
		$software_ids = $request->software_id;

		if ($software_ids) {
			foreach ($software_ids as $key => $software_id) {
				\App\Software::findorfail($software_id);
			}
		}

		if ($request->backend_ip != '') {
			$proxy->backend_ip = $request->backend_ip;
			$proxy->backend_port = $request->backend_port;
			$proxy->backend_type = $request->backend_type;
		}

		$proxy->ip = $request->ip;
		$proxy->port = $request->port;
		$proxy->type = $request->type;
		$proxy->username = $request->username;
		$proxy->password = $request->password;
		$proxy->expiry_date = $request->expiry_date_proxy;
		$proxy->status = ($request->status_proxy == '1' ? 1 : 0);
		$proxy->save();
		$keys_old = $request->key_old;
		$status_old = $request->status_old;
		$expiry_dates_old = $request->expiry_date_old;
		$limits_old = $request->limit_old;
		$priorities = $request->priority_old;
		$software_ids_old = $request->software_id_old;
		$software_proxy_ids = $request->software_proxy_id;
		\App\ProxySoftware::where('proxy_id', $proxy->id)->whereNotIn('id', is_array($software_proxy_ids) ? $software_proxy_ids : [])->delete();

		if ($software_proxy_ids) {
			foreach ($software_proxy_ids as $key => $software_proxy_id) {
				$ProxySoftware = \App\ProxySoftware::find($software_proxy_id);
				$ProxySoftware->proxy_id = $proxy->id;
				$ProxySoftware->software_id = $software_ids_old[$key];
				$ProxySoftware->expiry_date = $expiry_dates_old[$key];
				$ProxySoftware->key = $keys_old[$key];
				$ProxySoftware->use = $limits_old[$key];
				$ProxySoftware->status = $status_old[$key];
				$ProxySoftware->priority = $priorities[$key];
				$ProxySoftware->save();
			}
		}

		$keys = $request->key;
		$status = $request->status;
		$expiry_dates = $request->expiry_date;
		$priorities = $request->priority;
		$limits = $request->limit;
		$softwares_inserted = [];

		if ($software_ids) {
			foreach ($software_ids as $key => $software_id) {
				if (!in_array($software_id, $softwares_inserted)) {
					$ProxySoftware = new \App\ProxySoftware();
					$ProxySoftware->proxy_id = $proxy->id;
					$ProxySoftware->software_id = $software_id;
					$ProxySoftware->expiry_date = $expiry_dates[$key];
					$ProxySoftware->key = $keys[$key];
					$ProxySoftware->use = $limits[$key];
					$ProxySoftware->status = $status[$key];
					$ProxySoftware->priority = $priorities[$key];
					$ProxySoftware->save();
					$softwares_inserted[] = $software_id;
				}
			}
		}

		return back()->with('success', 'Updated Sucessfully');
	}

	public function proxy_addp(\Illuminate\Http\Request $request)
	{
		$rules = ['ip' => 'required', 'port' => 'required', 'type' => 'required|in:socks4,socks5,http,https'];
		$this->validate($request, $rules);
		$software_ids = $request->software_id;

		foreach ($software_ids as $key => $software_id) {
			\App\Software::findorfail($software_id);
		}

		$proxy = new \App\Proxy();

		if ($request->backend_ip != '') {
			$proxy->backend_ip = $request->backend_ip;
			$proxy->backend_port = $request->backend_port;
			$proxy->backend_type = $request->backend_type;
		}

		$proxy->ip = $request->ip;
		$proxy->port = $request->port;
		$proxy->type = $request->type;
		$proxy->username = $request->username;
		$proxy->password = $request->password;
		$proxy->expiry_date = $request->expiry_date_proxy;
		$proxy->status = ($request->status_proxy == '1' ? 1 : 0);
		$proxy->save();
		$insertedId = $proxy->id;
		$keys = $request->key;
		$status = $request->status;
		$expiry_dates = $request->expiry_date;
		$priorities = $request->priority;
		$limits = $request->limit;
		$softwares_inserted = [];

		foreach ($software_ids as $key => $software_id) {
			if (!in_array($software_id, $softwares_inserted)) {
				$ProxySoftware = new \App\ProxySoftware();
				$ProxySoftware->proxy_id = $insertedId;
				$ProxySoftware->software_id = $software_id;
				$ProxySoftware->expiry_date = $expiry_dates[$key];
				$ProxySoftware->key = $keys[$key];
				$ProxySoftware->use = $limits[$key];
				$ProxySoftware->status = $status[$key];
				$ProxySoftware->priority = $priorities[$key];
				$ProxySoftware->save();
				$softwares_inserted[] = $software_id;
			}
		}

		return back()->with('success', 'Created Sucessfully');
	}

	public function servers(\Illuminate\Http\Request $request)
	{
		if ($request->ajax()) {

			$data = \App\Server::latest()->get();
			return \DataTables::of($data)->addIndexColumn()->addColumn('action', function($row) {
				$btn = '<a href="' . route('server.edit', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
				$btn .= '<a href="' . route('server.delete', $row->id) . '" onclick="deleteit(event)" class="edit btn btn-danger btn-sm">Delete</a>';
				return $btn;
			})->addIndexColumn()->addColumn('software', function($row) {
				$text = '<p>' . \App\Software::find($row->software_id)->name . '</p>';
				return $text;
			})->rawColumns(['action', 'software', 'status'])->editColumn('status', function($row) {
				if ($row) {
					$expiry_date = intval($row->expiry_date);
					$date = \Carbon\Carbon::parse($row->created_at);
					$now = \Carbon\Carbon::now();
					$diff = $date->diffInDays($now);
					$days = $expiry_date - $diff;
					$days = (string) $days;
					$end_at = (!($expiry_date < $diff) ? 'Expire after ' . $days : 'Expired');
					$color = ($end_at != 'Expired' ? 'green' : 'red');
					$status = ($row->status == 1 ? 'Active' : 'Disabled');
					$str = '<div >' . $status;
					$str .= '<br> <span style=\'color:' . $color . '\'>' . $end_at . '</span></div>';
					return $str;
				}
			})->make(true);
		}

		return view('servers');
	}

	public function bulk_server_active(\Illuminate\Http\Request $request)
	{
		\App\Server::whereIn('id', $request->id)->update(['status' => 1]);
		return back()->with('success', 'Items activiated successfully');
	}

	public function bulk_server_disabled(\Illuminate\Http\Request $request)
	{
		\App\Server::whereIn('id', $request->id)->update(['status' => 0]);
		return back()->with('success', 'Items disabled successfully');
	}

	public function bulk_server_delete(\Illuminate\Http\Request $request)
	{
		\App\Server::destroy($request->id);
		return back()->with('success', 'Items deleted successfully');
	}

	public function server_delete($id)
	{
		$server = \App\Server::findorfail($id);
		$server->delete();
		return back()->with('success', $server->name . ' is deleted successfully');
	}

	public function server_add()
	{
		$softwares = \App\Software::where('status', 1)->get();
		return view('servers.add', compact('softwares'));
	}

	public function server_edit($id)
	{
		$server = \App\Server::findorfail($id);
		$softwares = \App\Software::where('status', 1)->get();
		return view('servers.edit', compact('server', 'softwares'));
	}

	public function server_editp($id, \Illuminate\Http\Request $request)
	{
		$server = \App\Server::findorfail($id);
		$rules = ['name' => 'required', 'software_id' => 'required'];
		$this->validate($request, $rules);
		$software = \App\Software::findorfail($request->software_id);
		$server->name = $request->name;
		$server->proxy_conf = $request->proxy_conf;
		$server->key = $request->key;
		$server->priority = $request->priority;
		$server->software_id = $request->software_id;
		$server->expiry_date = $request->expiry_date;
		$server->use = $request->limit;
		$server->status = ($request->status == '1' ? 1 : 0);
		$server->save();
		return back()->with('success', 'Updated Sucessfully');
	}

	public function server_addp(\Illuminate\Http\Request $request)
	{
		$rules = ['name' => 'required', 'software_id' => 'required'];
		$this->validate($request, $rules);
		$software = \App\Software::findorfail($request->software_id);
		$server = new \App\Server();
		$server->name = $request->name;
		$server->proxy_conf = $request->proxy_conf;
		$server->key = $request->key;
		$server->priority = $request->priority;
		$server->software_id = $request->software_id;
		$server->expiry_date = $request->expiry_date;
		$server->use = $request->limit;
		$server->status = ($request->status == '1' ? 1 : 0);
		$server->save();
		return back()->with('success', 'Created Sucessfully');
	}

	public function bulk_license_delete(\Illuminate\Http\Request $request)
	{
		\App\License::destroy($request->id);
		return back()->with('success', 'Items deleted successfully');
	}

	public function bulk_license_active(\Illuminate\Http\Request $request)
	{
		\App\License::whereIn('id', $request->id)->update(['status' => 1]);
		return back()->with('success', 'Items activiated successfully');
	}

	public function bulk_license_disabled(\Illuminate\Http\Request $request)
	{
		\App\License::whereIn('id', $request->id)->update(['status' => 0]);
		return back()->with('success', 'Items disabled successfully');
	}

	public function license_delete($id)
	{
		$license = \App\License::findorfail($id);
		$license->delete();
		return back()->with('success', 'The license of ' . $license->ip . ' is deleted successfully');
	}

	public function license_add(\Illuminate\Http\Request $request)
	{
		$softwares = \App\Software::where('status', 1)->get();
		$resellers = \App\Reseller::where('status', 1)->get();

		if ($request->whmcs == 'true') {
			return view('licenses.add_whmcs', compact('softwares', 'resellers'));
		}
		else {
			return view('licenses.add', compact('softwares', 'resellers'));
		}
	}

	public function license_edit($id)
	{
		$license = \App\License::findorfail($id);
		$softwares = \App\Software::where('status', 1)->get();
		$resellers = \App\Reseller::where('status', 1)->get();

		if (\App\Software::find($license->software_id)->key != 'whmcs') {
			return view('licenses.edit', compact('license', 'softwares', 'resellers'));
		}
		else {
			return view('licenses.edit_whmcs', compact('license', 'softwares', 'resellers'));
		}
	}

	public function license_editp($id, \Illuminate\Http\Request $request)
	{
		if ($request->software_id == 'whmcs') {
			$license = \App\License::findorfail($id);
			$rules = ['ip' => 'required', 'domain' => 'required', 'end_at' => 'required', 'software_id' => 'required'];
			$this->validate($request, $rules);
			$software = \App\Software::where('key', 'whmcs')->first();
			$search = \App\License::where('domain', $request->domain)->where('software_id', $software->id)->get();
			if ((0 < count($search)) && ($request->domain != $license->domain)) {
				return back()->withErrors([$request->domain . ' That Domain already registered <a href="' . route('license.edit', $search[0]->id) . '">Click here </a>']);
			}
			else {
				$license->domain = $request->domain;
				$license->license_key = $request->license_key;
				$license->validdirs = str_replace(["\r\n", "\r"], ',', $request->Validdir);
				$license->ip = $request->ip;
				$license->end_at = $request->end_at;
				$license->reseller_id = intval($request->reseller);
				$license->status = ($request->status == '1' ? 1 : 0);
				$license->save();
				return back()->with('success', 'Updated Sucessfully');
			}
		}
		else {
			$license = \App\License::findorfail($id);
			$rules = ['ip' => 'required', 'end_at' => 'required', 'software_id' => 'required'];
			$search = \App\License::where('ip', $request->ip)->where('software_id', $request->software_id)->get();
			if ((0 < count($search)) && ($request->ip != $license->ip)) {
				return back()->withErrors([$request->ip . ' That ip already registered <a href="' . route('license.edit', $search[0]->id) . '">Click here </a>']);
			}
			else {
				$this->validate($request, $rules);
				$software = \App\Software::findorfail($request->software_id);
				$license->ip = $request->ip;
				$license->end_at = $request->end_at;
				$license->software_id = $request->software_id;
				$license->reseller_id = intval($request->reseller);
				$license->status = ($request->status == '1' ? 1 : 0);
				$license->save();
				return back()->with('success', 'Updated Sucessfully');
			}
		}
	}

	public function license_addp(\Illuminate\Http\Request $request)
	{
		if ($request->software_id == 'whmcs') {
			$rules = ['ip' => 'required', 'domain' => 'required', 'brand' => 'required', 'end_at' => 'required', 'software_id' => 'required'];
			$this->validate($request, $rules);
			$software = \App\Software::where('key', 'whmcs')->first();
			$search = \App\License::where('domain', $request->domain)->where('software_id', $software->id)->get();

			if (0 < count($search)) {
				return back()->withErrors([$request->domain . ' That Domain already registered <a href="' . route('license.edit', $search[0]->id) . '">Click here </a>']);
			}
			else {
				$license = new \App\License();
				$license->domain = $request->domain;
				$license->license_key = generate_whmcs_license($request->brand);
				$license->validdirs = str_replace(["\r\n", "\r"], ',', $request->Validdir);
				$license->ip = $request->ip;
				$license->end_at = $request->end_at;
				$license->software_id = $software->id;
				$license->reseller_id = intval($request->reseller);
				$license->billingcycle = 'Monthly';
				$license->status = ($request->status == '1' ? 1 : 0);
				$license->save();
				$license_key = 'verify_whmcs';
				return back()->with('success', 'Created Sucessfully');
			}
		}
		else {
			$rules = ['ip' => 'required', 'end_at' => 'required', 'software_id' => 'required'];
			$this->validate($request, $rules);
			$search = \App\License::where('ip', $request->ip)->where('software_id', $request->software_id)->get();

			if (0 < count($search)) {
				return back()->withErrors([$request->ip . ' That ip already registered <a href="' . route('license.edit', $search[0]->id) . '">Click here </a>']);
			}
			else {
				$software = \App\Software::findorfail($request->software_id);
				$softwares = json_decode($software->softwares, true);

				if (0 < count($softwares)) {
					foreach ($softwares as $onesoftware) {
						$license = new \App\License();
						$license->ip = $request->ip;
						$license->end_at = $request->end_at;
						$license->software_id = $onesoftware;
						$license->reseller_id = intval($request->reseller);
						$license->status = ($request->status == '1' ? 1 : 0);
						$license->save();
					}
				}

				$license = new \App\License();
				$license->ip = $request->ip;
				$license->end_at = $request->end_at;
				$license->software_id = $request->software_id;
				$license->reseller_id = intval($request->reseller);
				$license->status = ($request->status == '1' ? 1 : 0);
				$license->save();
				return back()->with('success', 'Created Sucessfully');
			}
		}
	}

	public function licenses(\Illuminate\Http\Request $request)
	{
		if ($request->ajax()) {
			$data = \App\License::latest()->get();
			return \DataTables::of($data)->addIndexColumn()->addColumn('action', function($row) {
				$btn = '<a href="' . route('license.edit', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
				$btn .= '<a href="' . route('license.delete', $row->id) . '" onclick="deleteit(event)" class="edit btn btn-danger btn-sm">Delete</a>';
				return $btn;
			})->addColumn('software', function($row) {
				$text = '<p>' . \App\Software::find($row->software_id)->name . '</p>';
				return $text;
			})->addIndexColumn()->addColumn('reseller', function($row) {
				if ($row->reseller_id) {
					$reseller = \App\Reseller::find($row->reseller_id);

					if (\App\Reseller::find($row->reseller_id)) {
						$text = '<a target="_blank" href=' . route('reseller.edit', $reseller->id) . '>' . $reseller->name . '</a>';
					}
					else {
						$text = 'Reseller Deleted';
					}
				}
				else {
					$text = 'No Reseller';
				}

				return $text;
			})->rawColumns(['action', 'software', 'status', 'reseller'])->editColumn('status', function($row) {
				$end_at = (time() < strtotime($row->end_at) ? 'Up' : 'Expired');
				$color = ($end_at == 'Up' ? 'green' : 'red');
				$status = ($row->status == 1 ? 'Active' : 'Disabled');
				$str = '<div >' . $status;
				$str .= '<br> <span style=\'color:' . $color . '\'>' . $end_at . '</span></div>';
				return $str;
			})->editColumn('ip', function($row) {
				$software = \App\Software::find($row->software_id);

				if ($software) {
					if ($software->key == 'whmcs') {
						$str = $row->domain;
					}
					else {
						$str = $row->ip;
					}
				}
				else {
					$str = $row->ip;
				}

				return $str;
			})->make(true);
		}

		return view('licenses');
	}

	public function list_logs(\Illuminate\Http\Request $request)
	{
		if ($request->ajax()) {
			$data = \App\Log::latest()->get();
			return \DataTables::of($data)->addIndexColumn()->editColumn('created_at', function($row) {
				return $row->created_at->diffForHumans();
			})->make(true);
		}

		return view('logs');
	}

	public function bulk_reseller_active(\Illuminate\Http\Request $request)
	{
		\App\Reseller::whereIn('id', $request->id)->update(['status' => 1]);
		return back()->with('success', 'Items activiated successfully');
	}

	public function bulk_reseller_disabled(\Illuminate\Http\Request $request)
	{
		\App\Reseller::whereIn('id', $request->id)->update(['status' => 0]);
		return back()->with('success', 'Items disabled successfully');
	}

	public function bulk_reseller_delete(\Illuminate\Http\Request $request)
	{
		\App\Reseller::destroy($request->id);
		return back()->with('success', 'Items deleted successfully');
	}

	public function reseller_delete($id)
	{
		$reseller = \App\Reseller::findorfail($id);
		$reseller->delete();
		return back()->with('success', 'The brand of ' . $reseller->name . ' is deleted successfully');
	}

	public function getClients(\Illuminate\Http\Request $request)
	{
		return response()->json(whmcs_get_clients($request->term)['clients']['client']);
	}

	public function reseller_add()
	{
		$clients = whmcs_get_clients()['clients']['client'];
		$levels = \App\LevelReseller::latest()->get();
		return view('resellers.add', compact('levels', 'clients'));
	}

	public function reseller_edit($id)
	{
		$reseller = \App\Reseller::findorfail($id);
		$licenses_active = \App\License::where('reseller_id', $id)->where('end_at', '>', date('Y-m-d'))->get();
		$licenses = \App\License::where('reseller_id', $id)->get();
		$active_softwares = \App\Software::where('status', 1)->get();
		$levels = \App\LevelReseller::latest()->get();
		$clients = whmcs_get_clients();
		return view('resellers.edit', compact('reseller', 'levels', 'clients', 'licenses_active', 'licenses', 'active_softwares'));
	}

	public function reseller_editp($id, \Illuminate\Http\Request $request)
	{
		$reseller = \App\Reseller::findorfail($id);
		$rules = ['name' => 'required', 'end_at' => 'required', 'domain' => 'required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*$/', 'main_domain' => 'required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*$/', 'folder' => 'required', 'key_cmd' => 'required', 'type' => 'required'];
		$this->validate($request, $rules);

		if (!empty($request->level)) {
			\App\LevelReseller::findorfail($request->level);
		}

		$reseller->name = $request->name;
		$reseller->balance = floatval($request->balance);
		$reseller->end_at = $request->end_at;
		$reseller->domain = $request->domain;
		$reseller->main_domain = $request->main_domain;
		$reseller->folder = $request->folder;
		$reseller->key_cmd = $request->key_cmd;
		$reseller->type = $request->type;
		$reseller->client_id = $request->client_id;
		$reseller->level_id = $request->level;
		$reseller->status = ($request->status == '1' ? 1 : 0);
		$reseller->save();
		return back()->with('success', 'Updated Sucessfully');
	}

	public function reseller_addp(\Illuminate\Http\Request $request)
	{
		$rules = ['name' => 'required', 'end_at' => 'required', 'domain' => 'required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*$/', 'main_domain' => 'required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*$/', 'folder' => 'required', 'key_cmd' => 'required', 'type' => 'required'];
		$this->validate($request, $rules);

		if (!empty($request->level)) {
			\App\LevelReseller::findorfail($request->level);
		}

		$token = md5(time() . '-' . \uniqid() . '-' . time());
		$reseller = new \App\Reseller();
		$reseller->name = $request->name;
		$reseller->token = $token;
		$reseller->domain = $request->domain;
		$reseller->balance = floatval($request->balance);
		$reseller->end_at = $request->end_at;
		$reseller->main_domain = $request->main_domain;
		$reseller->level_id = $request->level;
		$reseller->folder = $request->folder;
		$reseller->type = $request->type;
		$reseller->client_id = $request->client_id;
		$reseller->key_cmd = $request->key_cmd;
		$reseller->status = ($request->status == '1' ? 1 : 0);
		$reseller->save();
		return back()->with('success', 'The brand of ' . $request->name . ' Created Sucessfully [' . $token . ']');
	}

	public function resellers(\Illuminate\Http\Request $request)
	{
		if ($request->ajax()) {
			$data = \App\Reseller::latest()->get();
			return \DataTables::of($data)->addIndexColumn()->addColumn('action', function($row) {
				$btn = '<a href="' . route('reseller.edit', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
				$btn .= '<a href="' . route('reseller.delete', $row->id) . '" onclick="deleteit(event)" class="edit btn btn-danger btn-sm">Delete</a>';
				return $btn;
			})->addColumn('level', function($row) {
				$reseller = \App\Reseller::find($row->id);
				$plan = 'default';

				if ($reseller->level_id) {
					$level = \App\LevelReseller::find($reseller->level_id);

					if ($level) {
						$plan = $level->title;
					}
				}

				$plan = ucfirst($plan);
				$text = '<p >' . $plan . '</p>';
				return $text;
			})->rawColumns(['action', 'status', 'level'])->editColumn('status', function($row) {
				$end_at = (time() < strtotime($row->end_at) ? 'Up' : 'Expired');
				$color = ($end_at == 'Up' ? 'green' : 'red');
				$status = ($row->status == 1 ? 'Active' : 'Disabled');
				$str = '<div >' . $status;
				$str .= '<br> <span style=\'color:' . $color . '\'>' . $end_at . '</span></div>';
				return $str;
			})->editColumn('type', function($row) {
				return ucfirst($row->type);
			})->editColumn('balance', function($row) {
				if ($row->type == 'whmcs') {
					$balance = whmcs_get_balance($row->client_id);
				}
				else {
					$balance = $row->balance;
				}

				return $balance;
			})->make(true);
		}

		return view('resellers');
	}

	public function logout()
	{
		\Auth::logout();
		return \Redirect::route('login');
	}

	public function plogin(\Illuminate\Http\Request $request)
	{
		$rules = ['username' => 'required', 'password' => 'required'];
		$this->validate($request, $rules);
		$remember = ($request->remember == '1' ? 1 : 0);

		if (\Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
			return redirect()->route('home');
		}
		else {
			return back()->withErrors('Invalid username or password');
		}
	}
}

?>