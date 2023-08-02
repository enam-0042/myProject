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
        return view('ipOperations.home');
    }

    public function addippage(){
        return view('ipOperations.addip');
    }


    public function changeippage($ip_id){
    //    $ipadd =Iplist::find($ip_id);
        $ipadd= Iplist::where('id','=',$ip_id)->first();
        return view('ipOperations.changeip', compact('ipadd'));

      //  return view('home');
    }


    public function showlistpage(){
       // return view('home');
       $iplists = Iplist::all();
     // $posts = jobproject::select('SELECT * FROM iplists');
       return view('ipOperations.showlist', compact('iplists'));
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
        $change= new Change();
        
        
        $ipadd=Iplist::find($ip_id);

        $change->ipaddress=$ipadd->ipaddress;
        $change->labels=$ipadd->labels;
        $res=$change->save();

        //$ipadd->labels= $req->input('labels');
        $ipadd->labels= $req->labels;
        $ipadd->update();
     //   $ipadd=Iplist::find($ip_id);

  

        if($res){
        return redirect("/showlist")->with('success', 'Label updated Successfully');}
        else {
            return redirect( url('changeip',['id' => $ip_id]) )->with('fail', 'Label updation Failed');
        }
           // echo "hello";
    }
    public function showchange(){
        $changes = Change::all();
        return view('ipOperations.showchanges',compact('changes'));

    }

    // show all data

    

}
