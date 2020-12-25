<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Post;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;


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
        $posts = Post::where('user_id', '=', Auth::id())->orderBy('id','desc')->paginate(5);

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
                'body'          =>'required',
                'featured_image'=>'sometimes|image'
            ));

        //store in the database
        $post = new Post();

        $post -> title = $request->title;
        $post -> body = Purifier::clean($request->body);
        $post -> category_id = $request->category_id;
        $post -> user_id = Auth::id();
        $post -> slug = $request->slug;

        //save our image
        if($request->hasFile('featured_image')){
            $image =$request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            
            $post->image =$filename;
        }

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

            $this->validate($request, array(
                    'title'=>'required|max:255',
                    'slug' =>"required|alpha_dash|min:5|max:255|unique:posts,slug, $id",
                    'category_id'   =>'required|integer',
                    'body' =>'required',    
                    'featured_image' =>'image'
            ));
        

        //save data to the database


        $post =  Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));
      
        if($request->hasFile('featured_image')){
            //add new photo
            $image =$request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->image;

            //update database
            $post->image =$filename;
            //Delete old photo 
            Storage::delete($oldFilename);
        }
    
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
        Storage::delete($post->image);

        $post -> delete();

        Session::flash('success','The blog post was successfully Deleted!');

        return redirect()->route('posts.index');
    }
}
