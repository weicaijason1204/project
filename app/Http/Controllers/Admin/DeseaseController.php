<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Desease;
use App\Http\Models\Tumor;
use Illuminate\Http\Request;

use App\Http\Requests;

class DeseaseController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deseases = Desease::all();
        return view('admin.deseases.index',[
            'deseases'=>$deseases
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deseases.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $tumor = Tumor::find(1);
        $tumor->deseases()->create([
            'name' =>$request->name,
        ]);
        return redirect('admin/desease');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desease = Desease::findOrFail($id);
        return view('admin.deseases.show',[
            'desease'=> $desease
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
        $desease = Desease::findOrFail($id);
        return view('admin.deseases.edit',[
            'desease'=> $desease
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
        $desease = Desease::findOrFail($id);

        if($request->has('name'))
            $desease->name = $request->name;
        if($request->has('tumor_id'))
            $desease->name = $request->name;
        if ($desease->save()) {
            return redirect('admin/desease');
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
        $desease = Desease::findOrFail($id);
        $desease->delete();
        return redirect('admin/desease');
    }
}
