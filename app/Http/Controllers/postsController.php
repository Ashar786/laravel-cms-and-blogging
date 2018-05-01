<?php

namespace App\Http\Controllers;


use App\Post;
use App\Tag;
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

        return view('admin.post.create')->with('categories',$categories)
                                                ->with('tags',Tag::all());
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
            'tags' => 'required'
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
        $post->tags()->attach($request->tags) ;
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
        $post = Post::find($id) ;
        return view('admin.post.edit')->with('post',$post)
                                            ->with('categories',Category::all())
                                            ->with('tags',Tag::all());

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
        $this->validate($request ,[
            'title' => 'required | max:255' ,
            'featured' => 'required | image',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $post = Post::find($id) ;
        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName() ;
            $featured->move('uploads/posts' , $featured_new_name) ;
            $post->featured = $featured_new_name ;
        }
        $post->title = $request->title ;


            $post->content = $request->content ;
            $post->category_id = $request->category_id ;
            $post->slug = str_slug($request->title) ;
            $post->tags()->sync($request->tags) ;
            $post->save() ;
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
        $post = Post::find($id) ;
        $post->delete() ;
        return redirect()->back() ;
    }

    public function trash(){
        $post = Post::onlyTrashed()->get() ;
        return view('admin.post.trash')->with('posts' ,$post) ;
    }
    public function kill($id) {
        $post = Post::withTrashed()->where('id',$id)->first() ;
        $post->forceDelete() ;
        Session::flash('success','Successfully Delete') ;
        return redirect()->back() ;

    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first() ;
        $post->restore() ;
        Session::flash('success','Successfully Restored') ;
        return redirect()->back() ;
    }
}
