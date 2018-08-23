<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\guru;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller as BaseController;

class GuruController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new guru;
        $data = $request->all(); 

        DB::beginTransaction();
        try{
            $guru->fill($data);
            $guru->save();
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB::rollback();
        }
        
        if($success){
            $returnHTML = view('backend.guru.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = guru::find($id);
        
        $data=array();
        $data['id'] = $guru->id;
        $data['nama'] = $guru->nama;
        $data['alamat'] = $guru->alamat;
        $data['status'] = $guru->status;

        $returnHTML = view('backend.guru.create')->render();
        return response()->json( array(
            'success' => true, 
            'html'=>$returnHTML,
            'data'=>$data
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = guru::find($id);
        $data = $request->all();
        DB::beginTransaction();
        try{
            $guru->update($data);
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB:rollback();
        }
        
        if($success){
            $returnHTML = view('backend.guru.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $guru = guru::destroy($id);
        $returnHTML = view('backend.guru.index')->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function anyData()
    {
        $sql = guru::all();
        
        return Datatables::of($sql)
                ->addColumn('action', function ($sql) {
                    return '<a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-primary edit-guru"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-danger delete-guru"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })

                ->make(true);
    }
}
