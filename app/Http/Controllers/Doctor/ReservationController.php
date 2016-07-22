<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Models\Doctor;
use App\Http\Models\Reservation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ReservationController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view('doctor.index',[
            'reservations'=>$reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('doctor.reservations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if ($request->hasFile('imgs')) {
//            $file = $request->file('imgs') ;
//            if ($file->isValid()){
//                $file->move(public_path().'/imgs/Reservation',$file->getClientOriginalName());
//                $file->imgs ='/imgs/Reservation/'.basename($file->getClientOriginalName());
//            }
//        }
//        $doctor = Doctor::find(1);
//        $doctor->reservations()->create([
//            'name' =>$request->name,
//            'phone' =>$request->phone,
//            'password' =>$request->password,
//            'wechat' =>$request->wechat,
//            'imgs' =>$request->imgs,
//            'describe' =>$request->describe,
//            'age' =>$request->age,
//            'gender' =>$request->gender,
//            'smoking' =>$request->smoking,
//            'city' =>$request->city,
//            'discovery_time' =>$request->discovery_time,
//            'situation' =>$request->situation,
//            'earnest_money' =>$request->earnest_money,
//            'report' =>$request->report,
//        ]);
//        return redirect('admin/reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('doctor.show',[
            'reservation'=>$reservation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $reservation = Reservation::findOrFail($id);
//        return view('doctor.reservations.edit',[
//            'reservation'=>$reservation
//        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $reservation = Reservation::findOrFail($id);
//        if ($request->hasFile('imgs')) {
//            $file = $request->file('imgs') ;
//            if ($file->isValid()){
//                $file->move(public_path().'/imgs/Reservation',$file->getClientOriginalName());
//                $file->imgs ='/imgs/Reservation/'.basename($file->getClientOriginalName());
//            }
//            $reservation->imgs = $file->imgs;
//        }
//        if($request->has('name')){
//            $reservation->name = $request->name;
//        }
//        if($request->has('phone')){
//            $reservation->phone = $request->phone;
//        }
//        if($request->has('password')){
//            $reservation->password = $request->password;
//        }
//        if($request->has('wechat')){
//            $reservation->wechat = $request->wechat;
//        }
//        if($request->has('describe')){
//            $reservation->describe = $request->describe;
//        }
//        if($request->has('age')){
//            $reservation->age = $request->age;
//        }
//        if($request->has('gender')){
//            $reservation->gender = $request->gender;
//        }
//        if($request->has('smoking')){
//            $reservation->smoking = $request->smoking;
//        }
//        if($request->has('city')){
//            $reservation->city = $request->city;
//        }
//        if($request->has('discovery_time')){
//            $reservation->discovery_time = $request->discovery_time;
//        }
//        if($request->has('situation')){
//            $reservation->situation = $request->situation;
//        }
//        if($request->has('earnest_money')){
//            $reservation->earnest_money = $request->earnest_money;
//        }
//        if($request->has('report')){
//            $reservation->report = $request->report;
//        }
//        if ($reservation->save()) {
//            return redirect('admin/reservation');
//        } else {
//            return back()->withErrors('保存失败');
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $reservation = Reservation::findOrFail($id);
//        $reservation->delete();
//        return redirect('doctor/reservation');
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
                $doctor = Doctor::first();
                $_password = $doctor->password;
                if($input['password_o']==$_password){
                    $doctor->password = $input['password'];
                    $doctor->update();
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
            return view('doctor.reset');
        }
    }
}
