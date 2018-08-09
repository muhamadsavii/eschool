<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller as BaseController;




class ArticlesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.article.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article = new Article;
        $data = $request->all();
        if($request->category !='cd-icon-picture.svg'){
            $html = $request->description;
            $doc = new \DOMDocument();
            $doc->loadHTML($html);
            $xpath = new \DOMXPath($doc);
            $src = $xpath->evaluate("string(//img/@src)");
            $data['title_img'] =  $src;
        }else{
            $content = $request->content;
            $data['title_img'] = $content['image'][0];
            
            $description = json_encode($request->content);
            $data['description'] = $description;

            // $tes2 = json_decode($tes);
            // foreach ($tes2 as $key => $value) {
            //     $data_tes[$key] = $value;
                
            // };
            // dd($data_tes['image'][0]);
        }
        

        // dd($data); 

        DB::beginTransaction();
        try{
            $article->fill($data);
            $article->save();
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB::rollback();
        }
        
        if($success){
            $returnHTML = view('backend.article.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $data=array();
        $data['id'] = $article->id;
        $data['title'] = $article->title;
        $data['description'] = $article->description;

        $returnHTML = view('backend.article.create')->render();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article =  Article::find($id);
        $data = $request->all();
        DB::beginTransaction();
        try{
            $article->update($data);
            DB::commit();
            $success = true;
        } catch(\Exception $e){
            $success = false;
            DB:rollback();
        }
        
        if($success){
            $returnHTML = view('backend.article.index')->render();
            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        }
        die();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $query = Article::destroy($id);
        $returnHTML = view('backend.article.index')->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function anyData()
    {
        $sql = Article::all();
        
        return Datatables::of($sql)
                ->addColumn('action', function ($sql) {
                    return '<a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-primary edit-article"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="#" data-id="'.$sql->id.'" class="btn btn-xs btn-danger delete-article"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })

                ->make(true);
    }

    public function form_image($id)
    {
        return view('backend.article.form_image')->with('id', $id);
    }
}
