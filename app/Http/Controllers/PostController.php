<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog in it from database
        $posts = Post::all();
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
                'title'=>'required|max:255',
                'body' =>'required'
            ));

        //store in the database
        $post = new Post();

        $post -> title = $request->title;
        $post -> body =$request ->body;

        $post->save();

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
        return view('posts.edit')-> withPost($post);
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
        $this->validate($request, array(
                'title'=>'required|max:255',
                'body' =>'required'
            ));

        //save data to the database
        

        $post =  Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

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
        //
    }
}
