<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        return view('home/index');
    }

    public function send(Request $request)
    {
        Mail::to($request->email)->send(new Message);
        if (Mail::failures()) {
            return redirect('/')->with('error', 'true');
        }else{
            return redirect('/')->with('send', 'true');
        }
    }
}
