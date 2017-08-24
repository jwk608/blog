<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog in it from database
        $posts = Post::orderBy('id','desc')->paginate(5);

        //return
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        //validate the data
        $this->validate($request, array(
                'title'         =>'required|max:255',
                'slug'          =>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   =>'required|integer',
                'body'          =>'required'
            ));

        //store in the database
        $post = new Post();

        $post -> title = $request->title;
        $post -> body = $request->body;
        $post -> category_id = $request->category_id;
        $post -> slug = $request->slug;

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success','THe blog post was successfully saved!');
        //redirect to another page

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);


        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();


        return view('posts.edit')-> withPost($post)->withCategories($categories)->withTags($tags);
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
        //validate date
        $post = Post::find($id);
        if($request->input('slug')== $post->slug ){
            $this->validate($request, array(
                    'title'=>'required|max:255',
                    'category_id'   =>'required|integer',
                    'body' =>'required'
            ));
        }else{
            $this->validate($request, array(
                    'title'=>'required|max:255',
                    'slug' =>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                    'category_id'   =>'required|integer',
                    'body' =>'required'
            ));
        }

        //save data to the database
        

        $post =  Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();
        //second parameter false prevents overriding, true since we want to overrride
        $post->tags()->sync($request->tags);
        Session::flash('success','The blog post was successfully Edited!');
        //redirect with flash data to posts.show

        return redirect()->route('posts.show', $post->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        $post -> delete();

        Session::flash('success','The blog post was successfully Deleted!');

        return redirect()->route('posts.index');
    }
}
