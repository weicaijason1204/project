<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Models\Doctor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoginController extends CommonController
{


    public function login(){
        if($input = Input::all()){
            $doctor  = Doctor::all();
            $phone = Doctor::where('phone',$input['phone'])->value('phone');
            if($phone != null){
                $password = Doctor::where('phone',$phone)->value('password');
                if($password == $input['password']){
                    session(['doctor'=>$doctor]);
                    return redirect('doctor/reservation');
                }else{
                    return back()->with('msg','密码错误');
                }
            }else{
                return back()->with('msg','电话错误');
            }
        }else{
            return view('doctor.login');
        }
    }
    public function quit(){
        session(['doctor'=>null]);
       return redirect('doctor/login');
    }
}
