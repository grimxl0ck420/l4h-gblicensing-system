<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Controllers;

class BlacklistController extends Controller
{
    public function bulk_active(\Illuminate\Http\Request $request)
    {
        \App\BlackList::whereIn("id", $request->id)->update(["status" => 1]);
        return back()->with("success", "Items activiated successfully");
    }
    public function bulk_disabled(\Illuminate\Http\Request $request)
    {
        \App\BlackList::whereIn("id", $request->id)->update(["status" => 0]);
        return back()->with("success", "Items disabled successfully");
    }
    public function bulk_delete(\Illuminate\Http\Request $request)
    {
        \App\BlackList::destroy($request->id);
        return back()->with("success", "Items deleted successfully");
    }
    public function delete($id)
    {
        $blacklist = \App\BlackList::findorfail($id);
        $blacklist->delete();
        return back()->with("success", " deleted successfully");
    }
    public function add()
    {
        return view("blacklist.add");
    }
    public function edit($id)
    {
        $blacklist = \App\BlackList::findorfail($id);
        return view("blacklist.edit", compact("blacklist"));
    }
    public function editp($id, \Illuminate\Http\Request $request)
    {
        $blacklist = \App\BlackList::findorfail($id);
        $rules = ["ip" => "required"];
        $this->validate($request, $rules);
        $blacklist->status = $request->status == "1" ? 1 : 0;
        $blacklist->save();
        return back()->with("success", "Updated Sucessfully");
    }
    public function addp(\Illuminate\Http\Request $request)
    {
        $rules = ["ip" => "required|unique:black_lists"];
        $this->validate($request, $rules);
        $blacklist = new \App\BlackList();
        $blacklist->ip = $request->ip;
        $blacklist->status = $request->status == "1" ? 1 : 0;
        $blacklist->save();
        return back()->with("success", "Created Sucessfully");
    }
    public function view(\Illuminate\Http\Request $request)
    {
        if ($request->ajax()) {
            $data = \App\BlackList::latest()->get();
            return \DataTables::of($data)->addIndexColumn()->addColumn(
                "action", function ($row) {
                    $btn = "<a href=\"" . route("blacklist.edit", $row->id) . "\" class=\"edit btn btn-primary btn-sm\">View</a>";
                    $btn .= "<a href=\"" . route("blacklist.delete", $row->id) . "\" onclick=\"deleteit(event)\" class=\"edit btn btn-danger btn-sm\">Delete</a>";
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
        return view("blacklist");
    }
}

?>