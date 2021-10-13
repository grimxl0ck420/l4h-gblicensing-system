<?php

namespace App\Http\Controllers;

class LevelController extends Controller
{
    public function bulk_level_delete(\Illuminate\Http\Request $request)
    {
        \App\LevelReseller::destroy($request->id);
        foreach ($request->id as $id) {
            \App\Reseller::where("level_id", $id)->update(["level_id" => "0"]);
        }
        return back()->with("success", "Items deleted successfully");
    }
    public function level_delete($id)
    {
        $levelreseller = \App\LevelReseller::findorfail($id);
        $levelreseller->delete();
        \App\Reseller::where("level_id", $id)->update(["level_id" => "0"]);
        return back()->with("success", $levelreseller->title . " is deleted successfully");
    }
    public function level_add()
    {
        $softwares = \App\Software::where("status", 1)->get();
        return view("levels.add", compact("softwares"));
    }
    public function level_edit($id)
    {
        $level = \App\LevelReseller::findorfail($id);
        $softwares = \App\Software::where("status", 1)->get();
        return view("levels.edit", compact("level", "softwares"));
    }
    public function level_editp($id, \Illuminate\Http\Request $request)
    {
        $level = \App\LevelReseller::findorfail($id);
        $rules = ["title" => "required", "softwares" => "required"];
        $this->validate($request, $rules);
        $level->title = $request->title;
        $level->save();
        $level_id = $level->id;
        \App\LevelResellerOption::where("level_reseller_id", $level_id)->delete();
        foreach ($request->softwares as $key => $software_one) {
            $software = \App\Software::findorfail($software_one);
            if ($request->price_reseller[$key]) {
                $price = $request->price_reseller[$key];
            } else {
                $price = 0;
            }
            $LevelResellerOption = new \App\LevelResellerOption();
            $LevelResellerOption->software_id = $software_one;
            $LevelResellerOption->level_reseller_id = $level_id;
            $LevelResellerOption->price_reseller = $price;
            $LevelResellerOption->save();
        }
        return back()->with("success", "Updated Sucessfully");
    }
    public function level_addp(\Illuminate\Http\Request $request)
    {
        $rules = ["title" => "required", "softwares" => "required"];
        $this->validate($request, $rules);
        $level = new \App\LevelReseller();
        $level->title = $request->title;
        $level->save();
        $level_id = $level->id;
        foreach ($request->softwares as $key => $software_one) {
            $software = \App\Software::findorfail($software_one);
            if ($request->price_reseller[$key]) {
                $price = $request->price_reseller[$key];
            } else {
                $price = 0;
            }
            $LevelResellerOption = new \App\LevelResellerOption();
            $LevelResellerOption->software_id = $software_one;
            $LevelResellerOption->level_reseller_id = $level_id;
            $LevelResellerOption->price_reseller = $price;
            $LevelResellerOption->save();
        }
        return back()->with("success", "Created Sucessfully");
    }
    public function levels(\Illuminate\Http\Request $request)
    {
        if ($request->ajax()) {
            $data = \App\LevelReseller::latest()->get();
            return \DataTables::of($data)->addIndexColumn()->addColumn(
                "action", function ($row) {
                    $btn = "<a href=\"" . route("level.edit", $row->id) . "\" class=\"edit btn btn-primary btn-sm\">View</a>";
                    $btn .= "<a href=\"" . route("level.delete", $row->id) . "\" onclick=\"deleteit(event)\" class=\"edit btn btn-danger btn-sm\">Delete</a>";
                    return $btn;
                }
            )->addIndexColumn()->addColumn(
                "resellers", function ($row) {
                        $text = "<p>" . \App\Reseller::where("level_id", $row->id)->count() . "</p>";
                        return $text;
                }
            )->rawColumns(["action", "resellers"])->make(true);
        }
        return view("levels");
    }
}

?>