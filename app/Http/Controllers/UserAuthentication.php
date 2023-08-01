<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
class UserAuthentication extends Controller
{
    //
    public function login()
    {
        return view("login");
    }
    public function registration()
    {
        return view("registration");
    }



    public function newUserRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|max:200|email',
            'password' => 'required | min:5 |max:50 |same:password1',
            'password1' => 'required | min:5 |max:50 |same:password',

        ], [
            'password.same' => 'Password Must be the same as below',
            'password1.same' => 'Password Must be the same as above',
            'password1.min' =>
            'The password field must be at least 5 characters.
         ',
            'password1.max' => 'Password Must be less than 50 in size'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            // echo "success";
            return back()->with('success', 'Registered Succesfully');
        } else {
            return back()->with('fail', 'Registration Unsuccessfull');
        }


    }
    public function newUserLogin(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:50'
        ]);
        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            //echo "passed";
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put('loginID', $user->id);
                return redirect('home');
            } else {
            return back()->with('fail', 'This Password does not match entry!! Sorry bro');
            }

        } else {
            return back()->with('fail', 'This User is not found!! Sorry bro');
            //echo "failed";
        }
    }
}