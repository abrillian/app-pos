<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('level')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create(){
        $levels = Level::all();
        return view('users.form', compact('levels'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_user'=>'required',
            'username'=>'required|unique:users,username',
            'password'=>'required|min:4',
            'level_id'=>'required'
        ]);

        User::create([
            'nama_user'=>$request->nama_user,
            'username'=>$request->username,
            'password'=>password_hash($request->password, PASSWORD_DEFAULT),
            'level_id'=>$request->level_id
        ]);

        return redirect()->route('users.index')->with('success','User ditambahkan');
    }

    public function edit(User $user){
        $levels = Level::all();
        return view('users.form', compact('user','levels'));
    }

    public function update(Request $request, User $user){
        $data = $request->only(['nama_user','username','level_id']);
        if($request->password){
            $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $user->update($data);

        return redirect()->route('users.index')->with('success','User diupdate');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success','User dihapus');
    }
}
