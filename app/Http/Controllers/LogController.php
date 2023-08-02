<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
class LogController extends Controller
{
    //
    public function logentry(){
        $data = Log::all();
        return view('loginEntry.loginentry',compact('data'));
    }
}
