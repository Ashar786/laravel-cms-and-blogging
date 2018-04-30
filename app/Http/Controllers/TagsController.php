<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag ;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all() ;
        return view('admin.tags.index')->with('tags' , $tags) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'tag' => 'required | max:255' ,
        ]);

        $tags = Tag::create([
            'tag' => $request->tag
        ]);
        Session::flash('success','Successfully created the Tag') ;
        return redirect()->back() ;
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
        $tag = Tag::find($id) ;
        return view('admin.tags.edit')->with('tag',$tag) ;
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
        $tag = Tag::find($id) ;
        $tag->tag = $request->tag ;
        $tag->save() ;
        Session::flash('success', 'Tags edited succesfully') ;
        return $this->index() ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id) ;
        Session::flash('success','Tag deleted successfully') ;
        return redirect()->back() ;
    }
}
