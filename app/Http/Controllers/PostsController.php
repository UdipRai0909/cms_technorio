<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use App\Profile;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')
            ->with('user', Auth::user())
            ->with('settings', Setting::first())
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('myposts', Post::all());
    }

    public function create()
    {
        $categories = Category::all();
        $tags=Tag::all();

        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info', 'You must have some categories and tags first!');
            return redirect()->back();
        }

        return view('admin.posts.create')
            ->with('categories', $categories)
            ->with('user',Auth::user())
            ->with('settings', Setting::first())
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('tags',$tags);
    }

    public function store(Request $request)
    {
        $this ->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name=time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([

            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' .$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id'=> Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created Successfully');

        return redirect()->back();


    }



    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')
            ->with('posts', Post::all())
            ->with('settings', Setting::first())
            ->with('user', Auth::user())
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function update(Request $request, $id)
    {
        $this -> validate($request, [

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured -> move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post Updated Successfully.');

        return redirect()->route('posts');

    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post -> delete();

        Session::flash('success', 'The post has just been trashed.');

        return redirect()->back();
    }

    public function trashed()
    {
        $trposts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('trposts', $trposts)
            ->with('settings', Setting::first())
            ->with('user', Auth::user());
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post Deleted Permanently');

        return redirect()->back();

    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post -> restore();

        Session::flash('success', 'Post restored successfully');

        return redirect()->route('posts');
    }


}
