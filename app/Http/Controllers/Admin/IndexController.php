<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    public function index(){
        return view('admin.index');
    }
    public function info(){
        return view('admin.info');
    }

    public function reset(){
        if($input = Input::all()){
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];

            $message = [
                'password.required'=>'新密码不能为空',
                'password.between'=>'密码必须在6-20位之间',
                'password.confirmed'=>'密码不一致',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $admin = Admin::first();
                $_password = Crypt::decrypt($admin->password);
                if($input['password_o']==$_password){
                    $admin->password = Crypt::encrypt($input['password']);
                    $admin->update();
                    $validator = '密码修改成功！!';
                    return back()->withErrors($validator);
                }else{
                    $validator = '原密码不正确!';
                    return back()->withErrors($validator);
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.reset');
        }
    }


}
