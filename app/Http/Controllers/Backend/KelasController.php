<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\kelas;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller as BaseController;


class KelasController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new kelas;
        $data = $request->all();
        // dd($data); 

        DB::beginTransaction();
        try{
            $kelas->fill($data);
            $kelas->save();
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB::rollback();
        }
        
        if($success){
            $returnHTML = view('backend.kelas.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = kelas::find($id);
        
        $data=array();
        $data['id'] = $kelas->id;
        $data['nama'] = $kelas->nama;
        $data['keterangan'] = $kelas->keterangan;

        $returnHTML = view('backend.kelas.create')->render();
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
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = kelas::find($id);
        $data = $request->all();
        DB::beginTransaction();
        try{
            $kelas->update($data);
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB:rollback();
        }
        
        if($success){
            $returnHTML = view('backend.kelas.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($id);
        $kelas = kelas::destroy($id);
        $returnHTML = view('backend.kelas.index')->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function anyData()
    {
        $sql = kelas::all();
        
        return Datatables::of($sql)
                ->addColumn('action', function ($sql) {
                    return '<a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-primary edit-kelas"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-danger delete-kelas"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })

                ->make(true);
    }
}
