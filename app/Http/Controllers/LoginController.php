<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }else{
            return view('sigin.index');
        }
    }

    public function actionlogin(Request $request){
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        $sqlusername = DB::table('users')
      	->select(DB::raw('users.*'))
      	->where('users.username','=',$data['username']);
        $sqlpass = DB::table('users')
      	->select(DB::raw('users.*'))
      	->where('users.password','=',$data['password']);
        $username = $sqlusername->count();
        $pass = $sqlpass->count();


        $data = $sqlpass->get();
        if ($username == 0 && $pass == 0) {
          return json_encode('username_and_pass_salah');
        } elseif ($username == 0) {
          return json_encode('username_salah');
        } elseif ($pass == 0) {
          return json_encode('pass_salah');
        } else {
          return json_encode('ok');
          Session::set('data', $data);
        }
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

    public function actionregist(Request $request){
        $data = [
          'name'    => $request->input('name'),
          'username'=> $request->input('username'),
          'password'=> $request->input('password'),
        ];
        DB::table("users")
    		->updateOrInsert($data);
        return json_encode('ok');
    }
}
