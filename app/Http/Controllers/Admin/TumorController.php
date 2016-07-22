<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Tumor;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class TumorController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tumors = Tumor::all();

        return view('admin.tumors.index',[
            'tumors'=>$tumors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tumors.add');
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
                    $file->move(public_path().'/imgs/Tumor',$file->getClientOriginalName());
                    $file->imgs ='/imgs/Tumor/'.basename($file->getClientOriginalName());
                }
        }
        $tumor = new Tumor();
        $tumor->imgs = $file->imgs;
        $tumor->name = $request->name;
        $tumor->save();
        return redirect('admin/tumor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tumor = Tumor::findOrFail($id);
        return view('admin.tumors.show',[
            'tumor'=>$tumor
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
        $tumor = Tumor::findOrFail($id);
        return view('admin.tumors.edit',[
            'tumor'=> $tumor
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
        $tumor = Tumor::findOrFail($id);
        if ($request->hasFile('imgs')) {
            $file = $request->file('imgs') ;
            if ($file->isValid()){
                $file->move(public_path().'/imgs/Tumor',$file->getClientOriginalName());
                $file->imgs ='/imgs/Tumor/'.basename($file->getClientOriginalName());
            }
            $tumor->imgs = $file->imgs;
        }
        if($request->has('name'))
            $tumor->name = $request->name;
        if ($tumor->save()) {
            return redirect('admin/tumor');
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
        $tumor = Tumor::findOrFail($id);
        $tumor->delete();
        return redirect('admin/tumor');
    }
}
