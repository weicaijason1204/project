<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Doctor;
use App\Http\Models\Reservation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

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

        return view('admin.reservations.index',[
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
        return view('admin.reservations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('imgs')) {
            $file = $request->file('imgs') ;
            if ($file->isValid()){
                $file->move(public_path().'/imgs/Reservation',$file->getClientOriginalName());
                $file->imgs ='/imgs/Reservation/'.basename($file->getClientOriginalName());
            }
        }
        $doctor = Doctor::find(1);
        $doctor->reservations()->create([
            'name' =>$request->name,
            'phone' =>$request->phone,
            'password' =>$request->password,
            'wechat' =>$request->wechat,
            'imgs' =>$request->imgs,
            'describe' =>$request->describe,
            'age' =>$request->age,
            'gender' =>$request->gender,
            'smoking' =>$request->smoking,
            'city' =>$request->city,
            'discovery_time' =>$request->discovery_time,
            'situation' =>$request->situation,
            'earnest_money' =>$request->earnest_money,
            'report' =>$request->report,
        ]);
        return redirect('admin/reservation');
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
        return view('admin.reservations.show',[
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
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit',[
            'reservation'=>$reservation
        ]);
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
        $reservation = Reservation::findOrFail($id);
        if ($request->hasFile('imgs')) {
            $file = $request->file('imgs') ;
            if ($file->isValid()){
                $file->move(public_path().'/imgs/Reservation',$file->getClientOriginalName());
                $file->imgs ='/imgs/Reservation/'.basename($file->getClientOriginalName());
            }
            $reservation->imgs = $file->imgs;
        }
        if($request->has('name')){
            $reservation->name = $request->name;
        }
        if($request->has('phone')){
            $reservation->phone = $request->phone;
        }
        if($request->has('password')){
            $reservation->password = $request->password;
        }
        if($request->has('wechat')){
            $reservation->wechat = $request->wechat;
        }
        if($request->has('describe')){
            $reservation->describe = $request->describe;
        }
        if($request->has('age')){
            $reservation->age = $request->age;
        }
        if($request->has('gender')){
            $reservation->gender = $request->gender;
        }
        if($request->has('smoking')){
            $reservation->smoking = $request->smoking;
        }
        if($request->has('city')){
            $reservation->city = $request->city;
        }
        if($request->has('discovery_time')){
            $reservation->discovery_time = $request->discovery_time;
        }
        if($request->has('situation')){
            $reservation->situation = $request->situation;
        }
        if($request->has('earnest_money')){
            $reservation->earnest_money = $request->earnest_money;
        }
        if($request->has('report')){
            $reservation->report = $request->report;
        }
        if ($reservation->save()) {
            return redirect('admin/reservation');
        } else {
            return back()->withErrors('保存失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect('admin/reservation');
    }
}
