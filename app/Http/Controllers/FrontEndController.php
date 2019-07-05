<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use Session;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('title', Setting::first()->site_name)
            ->with('user', Auth::user())
            ->with('categories', Category::take(5)->get())
            ->with('notifications', Post::orderBy('created_at', 'desc')->take(5)->get())
            ->with('first_post', Post::orderBy('created_at', 'asc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('laravel', Category::find(1))
            ->with('peppa', Category::find(2))
            ->with('language', Category::find(3))
            ->with('steam', Category::find(4))
            ->with('games', Category::find(5))
            ->with('settings', Setting::first())
            ->with('tags', Tag::all());
    }


    public function singlePost($slug)
    {
        $post=Post::where('slug',$slug)->first();

        $next_id = Post::where('id','>',$post->id)->min('id');

        $prev_id = Post::where('id','<',$post->id)->max('id');


        return view('single')
            ->with('post',$post)
            ->with('user',Auth::user())
            ->with('title', $post->title)
            ->with('categories', Category::take(5)->get())
            ->with('tags', Tag::all())
            ->with('settings', Setting::first())
            ->with('next',Post::find($next_id))
            ->with('prev', Post::find($prev_id));
    }



    public function category($id)
    {
        $category = Category::find($id);

        return view('category')
            ->with('category', $category)
            ->with('user',Auth::user())
            ->with('title', $category->name)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->get());
    }



    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag')
            ->with('tag', $tag)
            ->with('user',Auth::user())
            ->with('title', $tag->tag)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(6)->get());
    }



    public function frontnews()
    {
        $email = request('email');

        Newsletter::subscribe($email);

        Session::flash('subscribed','Successfully Subscribed!');

        return redirect()->back();
    }

}
