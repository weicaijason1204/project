<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoginController extends CommonController
{
    public function login(){
        if($input = Input::all()){
            $user = User::first();
            if($user->name == $input['name'] && Crypt::decrypt($user->password) == $input['password']){
                session(['user'=>$user]);
                return view('admin.index');
            }elseif($user->name != $input['name']){
                return back()->with('msg','用户名错误');
            }elseif(Crypt::decrypt($user->password) != $input['password']){
                return back()->with('msg','密码错误');
            }
        }else{
            return view('admin.login');
        }
    }

    public function crypt(){
        $str = '1234;';
       echo Crypt::encrypt($str);
    }
    public function quit(){
        session(['user'=>null]);
       return redirect('admin/login');
    }
}
