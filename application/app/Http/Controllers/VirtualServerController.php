<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Controllers;

class VirtualServerController extends Controller
{
    public function bulk_active(\Illuminate\Http\Request $request)
    {
        \App\VirtualServer::whereIn("id", $request->id)->update(["status" => 1]);
        return back()->with("success", "Items activiated successfully");
    }
    public function bulk_disabled(\Illuminate\Http\Request $request)
    {
        \App\VirtualServer::whereIn("id", $request->id)->update(["status" => 0]);
        return back()->with("success", "Items disabled successfully");
    }
    public function bulk_delete(\Illuminate\Http\Request $request)
    {
        \App\VirtualServer::destroy($request->id);
        return back()->with("success", "Items deleted successfully");
    }
    public function delete($id)
    {
        $virtualserver = \App\VirtualServer::findorfail($id);
        $virtualserver->delete();
        return back()->with("success", " deleted successfully");
    }
    public function add()
    {
        return view("virtualserver.add");
    }
    public function edit($id)
    {
        $virtualserver = \App\VirtualServer::findorfail($id);
        return view("virtualserver.edit", compact("virtualserver"));
    }
    public function editp($id, \Illuminate\Http\Request $request)
    {
        $virtualserver = \App\VirtualServer::findorfail($id);
        $rules = ["title" => "required", "server_key" => "required", "server_ip" => "required|ip"];
        $customMessages = ["server_key.required" => "The Key field is required."];
        if ($virtualserver->ip != $request->ip) {
            $rules["key"] = "required|unique";
        }
        $this->validate($request, $rules, $customMessages);
        $virtualserver->title = $request->title;
        $virtualserver->server_ip = $request->server_ip;
        $virtualserver->server_key = $request->server_key;
        $virtualserver->save();
        return back()->with("success", "Updated Sucessfully");
    }
    public function addp(\Illuminate\Http\Request $request)
    {
        $rules = ["title" => "required", "server_key" => "required|unique:virtual_servers", "server_ip" => "required|ip"];
        $customMessages = ["server_key.required" => "The Key field is required.", "server_key.unique" => "The Key must be unique."];
        $this->validate($request, $rules, $customMessages);
        $virtualserver = new \App\VirtualServer();
        $virtualserver->title = $request->title;
        $virtualserver->server_ip = $request->server_ip;
        $virtualserver->server_key = $request->server_key;
        $virtualserver->save();
        return back()->with("success", "Created Sucessfully");
    }
    public function view(\Illuminate\Http\Request $request)
    {
        if ($request->ajax()) {
            $data = \App\VirtualServer::latest()->get();
            return \DataTables::of($data)->addIndexColumn()->addColumn(
                "action", function ($row) {
                    $btn = "<a href=\"" . route("virtualserver.edit", $row->id) . "\" class=\"edit btn btn-primary btn-sm\">View</a>";
                    $btn .= "<a href=\"" . route("virtualserver.delete", $row->id) . "\" onclick=\"deleteit(event)\" class=\"edit btn btn-danger btn-sm\">Delete</a>";
                    return $btn;
                }
            )->rawColumns(["action", "status"])->editColumn(
                "status", function ($row) {
                        $status = $row->status == 1 ? "Active" : "Disabled";
                        $str = $status;
                        return $str;
                }
            )->make(true);
        }
        return view("virtualserver");
    }
}

?>