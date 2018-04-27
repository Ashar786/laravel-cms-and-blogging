<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all() ;
        return view('admin.post.index')->with('posts',$posts) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Category::all() ;
        if($categories->count() == 0)
        {
            Session::flash('info','Make sure you have atleast one category to create a post') ;
            return redirect()->back() ;
        }

        return view('admin.post.create')->with('categories',$categories);
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
            'title' => 'required | max:255' ,
            'featured' => 'required | image',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName() ;
        $featured->move('uploads/posts' , $featured_new_name) ;

        $post = Post::create([
            'title' => $request->title,
            'featured' => $featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)

        ]);
        Session::flash('success','Successfully created the post') ;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id) ;
        $post->destroy() ;
        return redirect()->back() ;
    }
}
