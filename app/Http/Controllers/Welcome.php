<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class Welcome extends Controller
{
    //
    public function welcome(){
        Session::flush();
        return view('welcome');
    }
}
