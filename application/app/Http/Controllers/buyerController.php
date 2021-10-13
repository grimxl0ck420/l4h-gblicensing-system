<?php

namespace App\Http\Controllers;

class buyerController extends Controller
{
    public function bulk_active(\Illuminate\Http\Request $request)
    {
        \App\Buyer::whereIn("id", $request->id)->update(["status" => 1]);
        return back()->with("success", "Items activiated successfully");
    }
    public function bulk_disabled(\Illuminate\Http\Request $request)
    {
        \App\Buyer::whereIn("id", $request->id)->update(["status" => 0]);
        return back()->with("success", "Items disabled successfully");
    }
    public function bulk_delete(\Illuminate\Http\Request $request)
    {
        \App\Buyer::destroy($request->id);
        return back()->with("success", "Items deleted successfully");
    }
    public function delete($id)
    {
        $buyer = \App\Buyer::findorfail($id);
        $buyer->delete();
        return back()->with("success", " deleted successfully");
    }
    public function add()
    {
        return view("buyer.add");
    }
    public function edit($id)
    {
        $buyer = \App\Buyer::findorfail($id);
        return view("buyer.edit", compact("buyer"));
    }
    public function editp($id, \Illuminate\Http\Request $request)
    {
        $buyer = \App\Buyer::findorfail($id);
        $rules = ["domain" => "required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*\$/"];
        $this->validate($request, $rules);
        $buyer->domain = $request->domain;
        $buyer->status = $request->status == "1" ? 1 : 0;
        $buyer->save();
        return back()->with("success", "Updated Sucessfully");
    }
    public function addp(\Illuminate\Http\Request $request)
    {
        $rules = ["domain" => "required|regex:/^[A-Za-z0-9\\.\\-]*[.][A-Za-z0-9]*\$/"];
        $this->validate($request, $rules);
        $code = substr(md5(microtime()), rand(0, 26), 5);
        $buyer = new \App\Buyer();
        $buyer->domain = $request->domain;
        $buyer->code = $code;
        $buyer->status = $request->status == "1" ? 1 : 0;
        $buyer->save();
        return back()->with("success", "Created Sucessfully [" . $code . "]");
    }
    public function view(\Illuminate\Http\Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Buyer::latest()->get();
            return \DataTables::of($data)->addIndexColumn()->addColumn(
                "action", function ($row) {
                    $btn = "<a href=\"" . route("buyer.edit", $row->id) . "\" class=\"edit btn btn-primary btn-sm\">View</a>";
                    $btn .= "<a href=\"" . route("buyer.delete", $row->id) . "\" onclick=\"deleteit(event)\" class=\"edit btn btn-danger btn-sm\">Delete</a>";
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
        return view("buyer");
    }
}

?>