<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(Auth::attempt($credentials)){
            session()->flash('success','登录成功');
            return redirect()->route('users.show',Auth::user());
        }else{
           session()->flash('danger','邮箱和密码不匹配');
           return redirect()->back()->withInput();
        }
    }
}
