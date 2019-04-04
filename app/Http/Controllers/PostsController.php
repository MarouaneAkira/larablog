<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Categories;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        if($categories->count() == 0)
        {
            Session::flash('info', 'You must have categories in order to create a new post');

            return redirect()->back();
        }

        return view('admin.posts.blog')->with('categories', $categories)->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request->all());        

        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'required|image|max:5120|mimes:jpg,jpeg,png,gif',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/posts/', $image_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => 'uploads/posts/'.$image_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');

        return redirect()->back();
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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Categories::all())->with('tags', Tag::all());
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
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('image'))
        {
            $image = $request->image;

            $image_new_name = time() . $image->getClientOriginalName();

            $image->move('uploads/posts/', $image_new_name);

            $post->image = 'uploads/posts/' . $image_new_name;
        }

        $post->title = $request->title;

        $post->content = $request->content;

        $post->category_id = $request->category_id;


        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully');

        return redirect()->route('posts');


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

        $post->delete();

        Session::flash('success', 'The post has been trashed');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully');

        return redirect()->route('posts');
    }
}
