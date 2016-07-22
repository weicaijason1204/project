<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Doctor\CommonController;
use App\Http\Models\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index',[
            'admins'=>$admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->password = Crypt::encrypt($request->password);
        $admin->permissions = $request->permissions;
        $admin->save();
        return redirect('admin/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.show',[
            'admin'=> $admin
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
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit',[
            'admin'=> $admin
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
        $message = [
            'password.required'=>'新密码不能为空',
            'password.between'=>'密码必须在6-20位之间',
        ];
        $validator = Validator::make($request->all(), [
            'password' => 'required|between:6,20',
        ],$message);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->password = Crypt::encrypt($request->password);
        $admin->permissions = $request->permissions;
        if ($admin->save()) {
            return redirect('admin/admin');
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
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect('admin/admin');
    }
}
