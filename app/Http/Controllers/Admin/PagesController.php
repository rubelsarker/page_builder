<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function pages($slug){
        $row = Page::where('slug',$slug)->firstOrFail();
        return view('pages.show',compact('row'));
    }
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Page::all();
        return view('pages.index',compact('data'));
    }


    public function create()
    {
        return view('pages.create');
    }
    public function design($id){
        $page = Page::find($id);
        return view('page',['page'=>$page]);
    }


    public function store(Request $request)
    {
        Page::create($request->all());
        return redirect()->back()->with('success','Pages Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $row = Page::find($id);
        return view('pages.show',compact('row'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       Page::where('id',$id)->update([
           'body'=>$request->body,
           'status'=>true
       ]);
       return response()->json(['msg'=>'pages design successfully saved','code'=>200]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
