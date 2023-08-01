<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Iplist;
use App\Models\Change;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\jobproject; 
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


    public function changeippage($ip_id){
    //    $ipadd =Iplist::find($ip_id);
        $ipadd= Iplist::where('id','=',$ip_id)->first();
        return view('changeip', compact('ipadd'));

      //  return view('home');
    }


    public function showlistpage(){
       // return view('home');
       $iplists = Iplist::all();
     // $posts = jobproject::select('SELECT * FROM iplists');
       return view('showlist', compact('iplists'));
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
    }
// incomplete complete it after list showing
    public function changeip(Request $req, $ip_id){
        $req->validate([
          //  'ipadd'=>'required|ip|min:1',
            'labels'=>'required|min:3'
        ],
         [
            'labels'=>'Label must contain 3 words',
            
        ]);
        $ipadd=Iplist::find($ip_id);
        //$ipadd->labels= $req->input('labels');
        $ipadd->labels= $req->labels;
        $ipadd->update();
        return redirect("/showlist")->with('success', 'Label updated Successfully');
           // echo "hello";
    }

    // show all data

    

}
