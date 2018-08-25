<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\galeri;
use App\User;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller as BaseController;

class GaleriController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.galeri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeri = new galeri;
        // $data = $request->all();
        $content = $request->content;
        
        $data = array();
        foreach ($content['image'] as $key => $value) {
            $data[] = [
                'nama' => $value
            ];
        }
        
        DB::beginTransaction();
        try{
            $galeri->insert($data);
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB::rollback();
        }
        
        if($success){
            $returnHTML = view('backend.galeri.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $galeri = galeri::destroy($id);
        $returnHTML = view('backend.galeri.index')->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function anyData()
    {
        $sql = galeri::all();
        
        return Datatables::of($sql)
                ->addColumn('action', function ($sql) {
                    return '<a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-danger delete-galeri"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })

                ->make(true);
    }

    public function form_image($id)
    {
        return view('backend.galeri.form_image')->with('id', $id);
    }
}
