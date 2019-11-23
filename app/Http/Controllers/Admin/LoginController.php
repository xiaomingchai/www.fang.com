<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Mail\Message;

//use App\Models\Admin;

class LoginController extends Controller
{
    //

    public function index()
    {
//        $user=Admin::where('username','admin')->get();
//        dd($user);
//
        return view("admin/login/index");
    }

    public function login(Request $request)
    {
//        $data=$request->all();
//        dd($data);
        $data = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:3|max:12',
        ]);
        if (!captcha_check($request->input('captcha'))) {
            return back()->withErrors("验证码有误");
        }
        //返回true或者false，完事之后如果有的话，返回true，反之false
        $res = auth()->guard('web')->attempt($data);
        $user = auth()->user();
//        $truename = $user->truename;
//        $email = $user->email;
        if (!$res) {
            return redirect(route('admin.login'))->withErrors(['error' => '账号或者密码错误']);
//         return view("admin/login/index")->withErrors('账户或者密码错误');
        }



//        获取IP
        //ip是否来自共享互联网

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip_address = $_SERVER['HTTP_CLIENT_IP'];

        } //ip是否来自代理

        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } //ip是否来自远程地址

        else {

            $ip_address = $_SERVER['REMOTE_ADDR'];

        }

//        dd( $ip_address);
        //当前时间
        $time=date("Y-m-d H:i:s",time());

        Mail::raw("用户登录成功,此次登录Ip为$ip_address,登录时间为$time", function (Message $message) use ($user) {
            $message->subject("用户登录成功");
            $message->to($user->email, $user->truename);
        });
        return redirect(route('admin.index'));
//        dd(1);
        //检查是否成功登录，成功true，失败false
//        $che=auth()->check();
//        if($che){
//            return view();
//        }
//        //登陆成功后返回用户信息,,没有的话返回null
//        $user=auth()->user();
//        dd($user);
    }

}
