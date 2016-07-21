<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Doctor;
use App\Http\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class DoctorController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index',[
            'doctors'=>$doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar') ;
            if ($file->isValid()){
                $file->move(public_path().'/imgs/Doctor',$file->getClientOriginalName());
                $file->avatar ='/imgs/Doctor/'.basename($file->getClientOriginalName());
            }
        }
        $hospital = Hospital::find(1);
        $hospital->doctors()->create([
            'avatar'=>$file->avatar,
            'name' =>$request->name,
            'summary' =>$request->summary,
            'content' =>$request->contents,
            'appellation' =>$request->appellation,
            'phone' =>$request->phone,
            'password' =>$request->password,
        ]);
        return redirect('admin/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.show',[
            'doctor'=> $doctor
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
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.edit',[
            'doctor'=> $doctor
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
        $doctor = Doctor::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar') ;
            if ($file->isValid()){
                $file->move(public_path().'/imgs/Doctor',$file->getClientOriginalName());
                $file->avatar ='/imgs/Doctor/'.basename($file->getClientOriginalName());
            }
            $doctor->avatar = $file->avatar;
        }
        if($request->has('name')){
            $doctor->name = $request->name;
        }
        if($request->has('summary')){
            $doctor->summary = $request->summary;
        }
        if($request->has('contents')){
            $doctor->content = $request->contents;
        }
        if($request->has('appellation')){
            $doctor->appellation = $request->appellation;
        }
        if($request->has('phone')){
            $doctor->phone = $request->phone;
        }
        if($request->has('password')){
            $doctor->password = $request->password;
        }
        if ($doctor->save()) {
            return redirect('admin/doctor');
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
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect('admin/doctor');
    }
}
