<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin;
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
            $admin  = Admin::all();
            $name = Admin::where('name',$input['name'])->value('name');
            if($name != null){
                $password = Admin::where('name',$name)->value('password');
                if(Crypt::decrypt($password) == $input['password']){
                    session(['admin'=>$admin]);
                    return view('admin.index');
                }else{
                    return back()->with('msg','密码错误');
                }
            }else{
                return back()->with('msg','用户名错误');
            }
        }else{
            return view('admin.login');
        }
    }

    public function quit(){
        session(['admin'=>null]);
       return redirect('admin/login');
    }
}
