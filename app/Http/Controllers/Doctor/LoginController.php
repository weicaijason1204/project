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
            $doctor = Doctor::first();
            if($doctor->phone == $input['phone'] && $doctor->password == $input['password']){
                session(['doctor'=>$doctor]);
                return redirect('doctor/reservation');
            }elseif($doctor->phone != $input['phone']){
                return back()->with('msg','用户名错误');
            }elseif($doctor->password != $input['password']){
                return back()->with('msg','密码错误');
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
