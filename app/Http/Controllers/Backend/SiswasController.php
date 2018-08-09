<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\User;
use App\siswas;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller as BaseController;



class SiswasController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $siswa = new siswas;
        $data = $request->all();
        // dd($data); 

        DB::beginTransaction();
        try{
            $siswa->fill($data);
            $siswa->save();
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB::rollback();
        }
        
        if($success){
            $returnHTML = view('backend.siswa.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function show(siswas $siswas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswas::find($id);
        
        $data=array();
        $data['id'] = $siswa->id;
        $data['nama'] = $siswa->nama;
        $data['alamat'] = $siswa->alamat;
        $data['kelas'] = $siswa->kelas;

        $returnHTML = view('backend.siswa.create')->render();
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
     * @param  \App\siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $siswa =  siswas::find($id);
        $data = $request->all();
        DB::beginTransaction();
        try{
            $siswa->update($data);
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB:rollback();
        }
        
        if($success){
            $returnHTML = view('backend.siswa.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($id);
        $siswa = siswas::destroy($id);
        $returnHTML = view('backend.siswa.index')->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function anyData()
    {
        $sql = siswas::all();
        
        return Datatables::of($sql)
                ->addColumn('action', function ($sql) {
                    return '<a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-primary edit-siswa"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-danger delete-siswa"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })

                ->make(true);
    }
}
