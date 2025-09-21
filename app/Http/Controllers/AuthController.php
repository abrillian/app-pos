<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate(['username'=>'required','password'=>'required']);
        $user = User::with('level')->where('username',$request->username)->first();

        if(!$user || !password_verify($request->password,$user->password)){
            return back()->with('error','Username atau password salah');
        }

        $request->session()->put('user',[
            'id'=>$user->id,
            'nama_user'=>$user->nama_user,
            'username'=>$user->username,
            'level'=>$user->level->level
        ]);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
