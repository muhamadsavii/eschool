<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\User;
use App\ekstrakulikuler;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller as BaseController;


class EkstrakulikulerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.ekstrakulikuler.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ekstrakulikuler.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ekstrakulikuler = new ekstrakulikuler;
        $data = $request->all();
        // dd($data); 

        DB::beginTransaction();
        try{
            $ekstrakulikuler->fill($data);
            $ekstrakulikuler->save();
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB::rollback();
        }
        
        if($success){
            $returnHTML = view('backend.ekstrakulikuler.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function show(ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ekstrakulikuler = ekstrakulikuler::find($id);
        
        $data=array();
        $data['id'] = $ekstrakulikuler->id;
        $data['nama'] = $ekstrakulikuler->nama;
        $data['guru'] = $ekstrakulikuler->guru;

        $returnHTML = view('backend.ekstrakulikuler.create')->render();
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
     * @param  \App\ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ekstrakulikuler = ekstrakulikuler::find($id);
        $data = $request->all();
        DB::beginTransaction();
        try{
            $ekstrakulikuler->update($data);
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB:rollback();
        }
        
        if($success){
            $returnHTML = view('backend.ekstrakulikuler.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($id);
        $ekstrakulikuler = ekstrakulikuler::destroy($id);
        $returnHTML = view('backend.ekstrakulikuler.index')->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function anyData()
    {
        $sql = ekstrakulikuler::all();
        
        return Datatables::of($sql)
                ->addColumn('action', function ($sql) {
                    return '<a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-primary edit-ekstrakulikuler"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-danger delete-ekstrakulikuler"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })

                ->make(true);
    }

}
