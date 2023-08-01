<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Iplist;
use App\Models\Change;
use Illuminate\Support\Facades\Hash;

use Session;
class ControlIpaddress extends Controller
{
    //
    public function ipHome(){
        return view('home');
    }

    public function addippage(){
        return view('addip');
    }


    public function changeippage(){
      //  return view('home');
    }


    public function showlistpage(){
       // return view('home');
    }
    public function addip(Request $req){
        $req->validate([
            'ipadd'=>'required|ip|unique:iplists,ipaddress|min:1',
            'label'=>'required|min:3'
        ],
         [
            'ipadd.ip'=>'Entered IP address does not in correct form',
            'ipadd.unique'=>'Please dont submit Existing IP address'
        ]);
        $newadd= new Iplist();
        $newadd->ipaddress= $req->ipadd;
        $newadd->labels= $req->label;
        $res = $newadd->save();
        if($res){
            return back()->with('success', 'IP address added Successfully');
        }
        else {
            return back()->with('fail', 'IP address submission failed, Good luck next time.');

        }



        //  return view('addip');

    }

}
