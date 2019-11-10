<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Admin;

class LoginController extends Controller
{
    //
    public function index(){
//        $user=Admin::where('username','admin')->get();
//        dd($user);
//
        return view("admin/login/index");
    }
    public function login(Request $request){
//        $data=$request->all();
//        dd($data);
        $data=$this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:3|max:12'
        ]);
        //返回true或者false，完事之后如果有的话，返回true，反之false
        $res=auth()->guard('web')->attempt($data);
        //检查是否成功登录，成功true，失败false
        $che=auth()->check();
        //登陆成功后返回用户信息,,没有的话返回null
        $user=auth()->user();
        dd($user);
    }
}
