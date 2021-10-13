<?php
/*
 * @ PHP 7.2
 * @ Decoder version : 1.0.0.2
 * @ Release on : 27/01/2021
 * @ Website    : http://EasyToYou.eu
 */

namespace App\Http\Controllers;

class MessageController extends Controller
{
    public function index()
    {
        $message = \App\Message::first();
        return view("message.index", compact("message"));
    }
    public function update(\Illuminate\Http\Request $request)
    {
        $message = \App\Message::first();
        $message->message = $request->message;
        $message->save();
        return back()->with("success", "Message updated successfully");
    }
}

?>