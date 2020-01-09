<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        session()->flash('success','注册成功');
        Auth::login($user);
        return redirect()->route('users.show',[$user]);
    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }

    public function update(User $user,Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'password'=>'nullable|confirmed|min:6'
        ]);

        $data['name'] = $request->name;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success','更新个人资料成功');

        return redirect()->route('users.show',[$user]);
    }
}
